<div id="overview">
  <div id="citation">
    <h3 style="display:inline">
      <?php print t('Citation:') ?>
    </h3> 
    <select id="style" class="form-select" onchange="jQuery('.citeproc-bibliography').attr('id', this.value); Drupal.settings.citeproc.refresh = true; Drupal.attachBehaviors();">
      <?php foreach ($styles as $id => $name) : ?>
        <?php if ($name == $default_style_name): ?>
          <option value="<?php print $id ?>" selected="selected"><?php print $name ?></option>
        <?php else: ?>
          <option value="<?php print $id ?>"><?php print $name ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>
    <?php print print_r($citation[$default_style_index], TRUE); ?>
    <?php print drupal_get_form('islandora_bibliography_citation_form', $pid); ?>
  </div>
  <?php if (!empty($accessnum)): ?>
    <a id="open-url-link" class="overview-field" href="http://linksource.ebsco.com/linking.aspx?ID=12411?sid=Entrez:PubMed&amp;id=pmid:<?php print $accessnum; ?>" target="_blank"><img alt="Click here to read" id="linkout-icon-unknown-DB__1__13__4178" border="0" src="<?php print $open_url_img; ?>"></a>
  <?php endif; ?>
  <?php if (!empty($abstract)): ?>
    <div id="abstract" class="overview-field">
      <h3><?php print t('Abstract:') ?></h3>
      <div id="abstract-content" class="overview-field-content"><?php print print_r($abstract, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (strlen($author) > 2): ?>
    <div id="author" class="overview-field">
      <h3><?php print t('Author:') ?></h3>
      <div id="author-content" class="author-field-content"><?php print print_r($author, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($editor)): ?>
    <div id="editor" class="overview-field">
      <h3><?php print t('Editor:') ?></h3>
      <div id="editor-content" class="editor-field-content"><?php print print_r($editor, TRUE); ?></div>
    </div>
  <?php endif;?>
  <?php if (!empty($contributor)): ?>
    <div id="contributor" class="overview-field">
      <h3><?php print t('Contributor:') ?></h3>
      <div id="contributor-content" class="contributor-field-content"><?php print print_r($contributor, TRUE); ?></div>
    </div>
  <?php endif;?>
  <?php if (!empty($advisor)): ?>
    <div id="advisor" class="overview-field">
      <h3><?php print t('Advisor:') ?></h3>
      <div id="advisor-content" class="advisor-field-content"><?php print print_r($advisor, TRUE); ?></div>
    </div>
  <?php endif;?>
  <?php if (!empty($illustrator)): ?>
    <div id="illustrator" class="overview-field">
      <h3><?php print t('Illustrator:') ?></h3>
      <div id="illustrator-content" class="illustrator-field-content"><?php print print_r($illustrator, TRUE); ?></div>
    </div>
  <?php endif;?>
  <?php if (!empty($corp_author)): ?>
    <div id="corp_author" class="overview-field">
      <h3><?php print t('Corporate Author:') ?></h3>
      <div id="corp_author-content" class="corp_author-field-content"><?php print print_r($corp_author, TRUE); ?></div>
    </div>
  <?php endif;?>
  <?php if (!empty($supporting_host)): ?>
    <div id="supporting_host" class="overview-field">
      <h3><?php print t('Supporting Host:') ?></h3>
      <div id="supporting_host-content" class="supporting_host-field-content"><?php print print_r($supporting_host, TRUE); ?></div>
    </div>
  <?php endif;?>
  <?php if (!empty($subject)): ?>
    <div id="subject" class="overview-field">
      <h3><?php print t('Subject Heading(s):') ?></h3>
      <div id="subject-content" class="overview-field-content"><?php print print_r($subject, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($geographic)): ?>
    <div id="geographic" class="overview-field">
      <h3><?php print t('Place(s):') ?></h3>
      <div id="geographic-content" class="overview-field-content"><?php print print_r($geographic, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (($temporal_range > 3) || !empty($temporal)): ?>
    <div id="temporal" class="overview-field">
      <h3><?php print t('Time Period(s):') ?></h3>
      <div id="temporal-content" class="overview-field-content"><?php print print_r($temporal, TRUE); ?></div>
	  <?php if ($temporal_range > 3): ?>
      		<div id="temporal_range-content" class="overview-field-content"><?php print print_r($temporal_range, TRUE); ?></div>
	  <?php endif; ?>
    </div>
  <?php endif; ?>
  <?php if (!empty($classification_lcc)): ?>
    <div id="classification_lcc" class="overview-field">
      <h3><?php print t('Call Number(s):') ?></h3>
      <div id="classification_lcc-content" class="overview-field-content"><?php print print_r($classification_lcc, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($classification_dcc)): ?>
    <div id="classification_dcc" class="overview-field">
      <h3><?php print t('Call Number(s):') ?></h3>
      <div id="classification_dcc-content" class="overview-field-content"><?php print print_r($classification_dcc, TRUE); ?></div>
    </div>
  <?php endif; ?>

  <?php if (!empty($work_type)): ?>
    <div id="work-type" class="overview-field">
      <h3><?php print t('Work Type:') ?></h3>
      <div id="work-type-content" class="overview-field-content"><?php print print_r($work_type, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($grant_number)): ?>
    <div id="grant-number" class="overview-field">
      <h3><?php print t('Grant Number(s):') ?></h3>
      <div id="grant-number-content" class="overview-field-content"><?php print print_r($grant_number, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($funding_agency)): ?>
    <div id="funding-agency" class="overview-field">
      <h3><?php print t('Funding Agency(s):') ?></h3>
      <div id="funding-agency-content" class="overview-field-content"><?php print print_r($funding_agency, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($core_facilties)): ?>
    <div id="core-facilties" class="overview-field">
      <h3><?php print t('Core facilties:') ?></h3>
      <div id="core-facilties-content" class="overview-field-content"><?php print print_r($core_facilties, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($source_system)): ?>
    <div id="source-system" class="overview-field">
      <h3><?php print t('Source System:') ?></h3>
      <div id="source-system-content" class="overview-field-content"><?php print print_r($source_system, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($ccsg_program)): ?>
    <div id="ccsg-program" class="overview-field">
      <h3><?php print t('CCSG Program:') ?></h3>
      <div id="ccsg-program" class="overview-field-content"><?php print print_r($ccsg_program, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($peer_reviewed)): ?>
    <div id="peer-reviewed" class="overview-field">
      <h3><?php print t('Peer Reviewed:') ?></h3>
      <div id="peer-reviewed-content" class="overview-field-content"><?php print print_r($peer_reviewed, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($url)):?>
    <div id="urls" class="overview-field">
      <h3><?php print t('Publisher URL:') ?></h3>
      <ul>
      <?php foreach (explode('<br/>', $url) as $a_url):?>
        <li class="overview-field-content"><?php print l($a_url, $a_url); ?></li>
      <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
  <?php if (!empty($publisher)): ?>
    <div id="publisher" class="overview-field">
      <h3><?php print t('Publisher:') ?></h3>
      <div id="publisher-content" class="overview-field-content"><?php print print_r($publisher, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($otherVersion)): ?>
    <div id="otherVersion" class="overview-field">
      <h3><?php print t('Other Version(s):') ?></h3>
      <div id="otherVersion-content" class="overview-field-content"><?php print print_r($otherVersion, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($otherVersion)): ?>
    <div id="isReplacedBy" class="overview-field">
      <h3><?php print t('Is Replaced By:') ?></h3>
      <div id="isReplacedBy-content" class="overview-field-content"><?php print print_r($isReplacedBy, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($replaces)): ?>
    <div id="replaces" class="overview-field">
      <h3><?php print t('Replaces:') ?></h3>
      <div id="replaces-content" class="overview-field-content"><?php print print_r($replaces, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($requires)): ?>
    <div id="requires" class="overview-field">
      <h3><?php print t('Requires:') ?></h3>
      <div id="requires-content" class="overview-field-content"><?php print print_r($requires, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($isBasedOn)): ?>
    <div id="isBasedOn" class="overview-field">
      <h3><?php print t('Is Based On:') ?></h3>
      <div id="isBasedOn-content" class="overview-field-content"><?php print print_r($isBasedOn, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($hasPart)): ?>
    <div id="hasPart" class="overview-field">
      <h3><?php print t('Has Part:') ?></h3>
      <div id="hasPart-content" class="overview-field-content"><?php print print_r($hasPart, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($otherVersion)): ?>
    <div id="isPartOfSeries" class="overview-field">
      <h3><?php print t('Is Part of Series:') ?></h3>
      <div id="isPartOfSeries-content" class="overview-field-content"><?php print print_r($isPartOfSeries, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($isPartOf)): ?>
    <div id="isPartOf" class="overview-field">
      <h3><?php print t('Is Part of:') ?></h3>
      <div id="isPartOf-content" class="overview-field-content"><?php print print_r($isPartOf, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($isFormOf)): ?>
    <div id="otherVersion" class="overview-field">
      <h3><?php print t('If a Form of:') ?></h3>
      <div id="isFormOf-content" class="overview-field-content"><?php print print_r($isFormOf, TRUE); ?></div>
    </div>
  <?php endif; ?>

    <?php if (!empty($dateCaptured)): ?>
    <div id="isbn" class="overview-field">
      <h3><?php print t('ISBN:') ?></h3>
      <div id="isbn-content" class="overview-field-content"><?php print print_r($isbn, TRUE); ?></div>
    </div>
  <?php endif; ?>
    <?php if (!empty($dateCaptured)): ?>
    <div id="issn" class="overview-field">
      <h3><?php print t('ISSN:') ?></h3>
      <div id="issn-content" class="overview-field-content"><?php print print_r($issn, TRUE); ?></div>
    </div>
  <?php endif; ?>
    <?php if (!empty($uri)): ?>
    <div id="uri" class="overview-field">
      <h3><?php print t('URI:') ?></h3>
      <div id="uri-content" class="overview-field-content"><?php print print_r($uri, TRUE); ?></div>
    </div>
  <?php endif; ?>
    <?php if (!empty($gov)): ?>
    <div id="gov" class="overview-field">
      <h3><?php print t('Government Document Identifier:') ?></h3>
      <div id="gov-content" class="overview-field-content"><?php print print_r($gov, TRUE); ?></div>
    </div>
  <?php endif; ?>
    <?php if (!empty($sici)): ?>
    <div id="sici" class="overview-field">
      <h3><?php print t('Serial Item and Contribution Identifier:') ?></h3>
      <div id="sici-content" class="overview-field-content"><?php print print_r($sici, TRUE); ?></div>
    </div>
  <?php endif; ?>
    <?php if (!empty($ismn)): ?>
    <div id="ismn" class="overview-field">
      <h3><?php print t('ISMN:') ?></h3>
      <div id="ismn-content" class="overview-field-content"><?php print print_r($ismn, TRUE); ?></div>
    </div>
  <?php endif; ?>
    <?php if (!empty($grant)): ?>
    <div id="grant" class="overview-field">
      <h3><?php print t('Grant Identifier:') ?></h3>
      <div id="grant-content" class="overview-field-content"><?php print print_r($grant, TRUE); ?></div>
    </div>
  <?php endif; ?>
    <?php if (!empty($doi)): ?>
    <div id="doi" class="overview-field">
      <h3><?php print t('DOI:') ?></h3>
      <div id="doi-content" class="overview-field-content"><?php print print_r($doi, TRUE); ?></div>
    </div>
  <?php endif; ?>
    <?php if (!empty($other)): ?>
    <div id="other" class="overview-field">
      <h3><?php print t('Other Identifier:') ?></h3>
      <div id="other-content" class="overview-field-content"><?php print print_r($other, TRUE); ?></div>
    </div>
  <?php endif; ?>


  <?php if (!empty($dateCaptured)): ?>
    <div id="dateCaptured" class="overview-field">
      <h3><?php print t('Date Captured:') ?></h3>
      <div id="dateCaptured-content" class="overview-field-content"><?php print print_r($dateCaptured, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($dateValid)): ?>
    <div id="dateValid" class="overview-field">
      <h3><?php print t('Date Valid:') ?></h3>
      <div id="dateValid-content" class="overview-field-content"><?php print print_r($dateValid, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($dateAvailable)): ?>
    <div id="dateAvailable" class="overview-field">
      <h3><?php print t('Date Available:') ?></h3>
      <div id="dateAvailable-content" class="overview-field-content"><?php print print_r($dateAvailable, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($dateCreated)): ?>
    <div id="dateCreated" class="overview-field">
      <h3><?php print t('Date Created:') ?></h3>
      <div id="dateCreated-content" class="overview-field-content"><?php print print_r($dateCreated, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($copyrightDate)): ?>
    <div id="copyrightDate" class="overview-field">
      <h3><?php print t('Copyright Date:') ?></h3>
      <div id="copyrightDate-content" class="overview-field-content"><?php print print_r($copyrightDate, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($dateIssued)): ?>
    <div id="dateIssued" class="overview-field">
      <h3><?php print t('Date Issued:') ?></h3>
      <div id="dateIssued-content" class="overview-field-content"><?php print print_r($dateIssued, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($accessCondition)): ?>
    <div id="accessCondition" class="overview-field">
      <h3><?php print t('Access Conditions:') ?></h3>
      <div id="accessCondition-content" class="overview-field-content"><?php print print_r($accessCondition, TRUE); ?></div>
    </div>
  <?php endif; ?>
  <?php if (!empty($genre)): ?>
    <div id="genre" class="overview-field">
      <h3><?php print t('Genre:') ?></h3>
      <div id="genre-content" class="genre-field-content"><?php print print_r($genre, TRUE); ?></div>
    </div>
  <?php endif;?>

</div>
