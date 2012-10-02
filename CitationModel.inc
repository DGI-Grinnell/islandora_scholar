<?php

// $Id$

/**
 * @file
 *
 */
module_load_include('inc', 'fedora_repository', 'api/fedora_item');
module_load_include('inc', 'content_model_viewer', 'models/AbstractModel');

/**
 * function for use with array_map().
 */
function contributor_format($family,$given) {
  return "$family, $given";
}

function temporal_format($start,$end) {
  return "$start - $end";
}

/**
 * Models the display information a field books should have.
 */
class CitationModel extends AbstractModel {

  /**
   * Object Pid.
   * 
   * @var string
   */
  protected $pid;

  /**
   * The Object.
   * 
   * @var Fedora_Item
   */
  public $item;

  /**
   * Creates CitationModel instance.
   * 
   * @param string $pid 
   */
  public function __construct($pid) {
    $this->pid = $pid;
    $this->item = new Fedora_Item($pid);
  }

  /**
   * The function required for this viewer to render correctly.
   */
  public function getInitializationFunction() {
    return NULL; // Nothing at the moment...
  }

  /**
   * Adds all of the required javascript/css/etc that this model needs to be shown.
   */
  public function addRequiredResources() {
    module_load_include('inc', 'citeproc', 'CiteProcJS');
    drupal_add_css(drupal_get_path('module', 'scholar') . '/css/Record.css');
    CiteProcJS::addResources(); // Includes javascript and other fun things.
  }

  /**
   * Gets HTML to be rendered into the overview Panel.
   * 
   * @return string
   */
  public function render() {
    return theme(THEME_SCHOLAR_OVERVIEW_PANEL_CITATION, $this->pid);
  }

  /**
   * Gets the HTML required for the Citation.
   * 
   * @return string
   */
  public function getCitation($style_name) {
    if (isset($this->item->datastreams['MODS'])) {
      $style = citeproc_style($style_name);

      $cached_raw = NULL;
      $cache_id = NULL;
      
      if(CITEPROC_DO_CACHE) {
        $cached_raw = cache_get($cache_id);
        $cache_id = CITEPROC_CACHE_PREFIX . '_' . $pid;
      }
      
      $bibliography = NULL;
      if (!empty($cached_raw)) {
        $bibliography = citeproc_bibliography_from_raw_array($style, $cached_raw->data);
      }
      else {
        $mods = $this->item->get_datastream_dissemination('MODS');
        $mods = trim($mods);
        if (!empty($mods)) {
          $bibliography = citeproc_bibliography_from_mods($style, $mods, $cache_id);
        }
      }
      return array($bibliography->getID(), $bibliography->render());
    }
    return array(NULL, '');
  }

}

/**
 * Preprocess some junk for the overview.
 * 
 * @param array $variables 
 */
function template_preprocess_scholar_overview_panel_citation(array &$variables) {
  module_load_include('inc', 'csl', 'CSL');
  module_load_include('inc', 'islandora_bibliography', 'CitationForm');
  $pid = $variables['pid'];
  // Open URL Image
  //XXX:  This should most definitely be moved out into the module preprocess function city_of_hope_preprocess_scholar_overview_panel_citation
  if (module_exists('city_of_hope')) {
    $variables['open_url_img'] = url(drupal_get_path('module', 'city_of_hope').'/images/openurl.jpg');
  }
  //$item = new Fedora_Item($pid);
  $model = new CitationModel($pid);
  $item = & $model->item;
  // Citations
  $styles = CSL::GetNames();
  $default_style_name = CSL::GetDefaultName();
  $variables['default_style_name'] = $default_style_name;
  $variables['default_style_index'] = 0;
  foreach ($styles as $name) {
    list($id, $html) = $model->getCitation($name);
    $variables['citation'][] = $html;
    $variables['styles'][$id] = $name;
    if ($name == $default_style_name) {
      $variables['default_style_index'] = count($variables['citation']) - 1;
    }
  }
  // Abstract
  if (isset($item->datastreams['MODS'])) {
    $mods = $item->get_datastream_dissemination('MODS');
    $mods = trim($mods);
    if (!empty($mods)) {
      $mods = new SimpleXMLElement($mods);
      $mods->registerXPathNamespace('mods', 'http://www.loc.gov/mods/v3');
      $parts = array(
        'abstract' => '/mods:mods/mods:abstract',
        'subject' => '/mods:mods/mods:subject/mods:topic',
        'grant_number' => '/mods:mods/mods:name[@type="corporate"]/mods:role[mods:roleTerm[@type="text"]="funding agency"]/../mods:description[@type="grant number"]',
        'funding_agency' => '/mods:mods/mods:name[@type="corporate"]/mods:role[mods:roleTerm[@type="text"]="funding agency"]/../mods:namePart',

        'work_type' => '/mods:mods/mods:note[@type="work type"]',
        'core_facility' => '/mods:mods/mods:note[@type="core facilities"]',
        'source_system' => '/mods:mods/mods:recordInfo/mods:recordOrigin',
        'ccsg_program' => 'string()', // @todo
        'peer_reviewed' => '/mods:mods/mods:note[@type="peer reviewed"]',
        'accessnum' => '/mods:mods/mods:identifier[@type="accessnum"]',
	'url' => '/mods:mods/mods:location/mods:url',
	'corp_author' => '/mods:mods/mods:name[@type="corporate"]/mods:role[mods:roleTerm="author"]/../mods:namePart',
	'supporting_host' => '/mods:mods/mods:name[@type="corporate"]/mods:role[mods:roleTerm="Supporting host"]/../mods:namePart',
	'geographic' => '/mods:mods/mods:subject/mods:geographic',
	'classification_dcc' => '/mods:mods/mods:classification[@authority="dcc"]',
	'classification_lcc' => '/mods:mods/mods:classification[@authority="lcc"]',
	'dateCaptured' => '/mods:mods/mods:originInfo/mods:dateCaptured',
	'dateValid' => '/mods:mods/mods:originInfo/mods:dateValid',
	'dateAvailable' => '/mods:mods/mods:originInfo/mods:dateOther[@type="available"]',
	'dateCreated' => '/mods:mods/mods:originInfo/mods:dateCreated',
	'copyrightDate' => '/mods:mods/mods:originInfo/mods:copyrightDate',
	'dateIssued' => '/mods:mods/mods:originInfo/mods:dateIssued',
	'accessCondition' => '/mods:mods/mods:accessCondition[@type="useAndReproduction"]',
	'temporal' => '/mods:mods/mods:subject/mods:temporal[not(@*)]',
	'genre' => '/mods:mods/mods:genre',
	'publisher' => '/mods:mods/mods:originInfo/mods:publisher'
      );


      $relation_types = array('otherVersion','isReplacedBy','replaces','requires','isBasedOn','hasPart','isPartOfSeries','isPartOf','isFormOf');
      foreach ($relation_types as $relation_type) {
        $relations[$relation_type] = '/mods:mods/mods:relatedItem[@type="'. $relation_type  .'"]/mods:titleInfo/mods:title';
      }

      $identifier_types = array('gov','uri','sici','ismn','grant','issn','isbn','doi','other');
      foreach ($identifier_types as $identifier_type) {
        $identifiers[$identifier_type] = '/mods:mods/mods:identifier[@type="'. $identifier_type  .'"]';
      }

      $parts = array_merge($parts, $relations, $identifiers);

      foreach ($parts as $key => $xpath) {
        if ($nodes = $mods->xpath($xpath)) {
          $variables[$key] = implode('<br/>', array_filter($nodes));
        }
      }

      $contributor_types = array('author','editor','advisor','contributor','illustrator');
      foreach ($contributor_types as $contributor_type) {
//        $contributors = $mods->xpath('/mods:mods/mods:name[@type="personal"]/mods:role[mods:roleTerm="'. $contributor_type  .'"]');
        $contributors_given = $mods->xpath('/mods:mods/mods:name[@type="personal"]/mods:role[mods:roleTerm="'. $contributor_type  .'"]/../mods:namePart[@type="given"]');
        $contributors_family = $mods->xpath('/mods:mods/mods:name[@type="personal"]/mods:role[mods:roleTerm="'. $contributor_type  .'"]/../mods:namePart[@type="family"]');
        if (!empty($contributors_given)) {
          $variables[$contributor_type] = implode('<br/>', array_map('contributor_format',$contributors_family,$contributors_given));
	}
      }

        $start = $mods->xpath('/mods:mods/mods:subject/mods:temporal[@point="start"]');
        $end = $mods->xpath('/mods:mods/mods:subject/mods:temporal[@point="end"]');
        if (!empty($start)) {
	    $variables['temporal_range'] = implode('<br/>', array_map('temporal_format',$start,$end));
	}
    }
  }
}
