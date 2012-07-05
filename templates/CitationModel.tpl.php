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
 
  <?php if (!empty($author)): ?>
    <div id="author" class="overview-field">
      <h3><?php print t('Author:') ?></h3>
      <div id="author-content" class="author-field-content"><?php print print_r($author, TRUE); ?></div>
    </div>
  <?php endif;?>
  <?php if (!empty($advisor)): ?>
    <div id="advisor" class="overview-field">
      <h3><?php print t('Advisor:') ?></h3>
      <div id="advisor-content" class="advisor-field-content"><?php print print_r($advisor, TRUE); ?></div>
    </div>
  <?php endif;?>
 <!--
 <h3><?php print t('Editor:') ?></h3>
 <h3><?php print t('Contributor:') ?></h3>
 <h3><?php print t('Advisor:') ?></h3>
 <h3><?php print t('Illustrator:') ?></h3>
 <h3><?php print t('Office:') ?></h3>
 <h3><?php print t('Dept.:') ?></h3>
 <h3><?php print t('Concentration:') ?></h3>
 <h3><?php print t('Program:') ?></h3>
 <h3><?php print t('Corporate Author:') ?></h3>
 <h3><?php print t('Investigator Name:') ?></h3>
 <h3><?php print t('Subject:') ?></h3>
 <h3><?php print t('LCSH:') ?></h3>
 <h3><?php print t('Topic:') ?></h3>
 <h3><?php print t('Place:') ?></h3>
 <h3><?php print t('Chonological:') ?></h3>
 <h3><?php print t('Keyword:') ?></h3>
 <h3><?php print t('Other:') ?></h3>
 <h3><?php print t('Classification:') ?></h3>
 <h3><?php print t('LLC:') ?></h3>
 <h3><?php print t('DCC:') ?></h3>
 <h3><?php print t('Publisher:') ?></h3>
 <h3><?php print t('Coverage:') ?></h3>
 <h3><?php print t('Latitude:') ?></h3>
 <h3><?php print t('Longitude:') ?></h3>
 <h3><?php print t('Temporal:') ?></h3>
 <h3><?php print t('Date:') ?></h3>
 <h3><?php print t('Format:') ?></h3>
 <h3><?php print t('Medum:') ?></h3>
 <h3><?php print t('Mimetype:') ?></h3>
 <h3><?php print t('Extent:') ?></h3>
 <h3><?php print t('Relations:') ?></h3>
 <h3><?php print t('URI:') ?></h3>
 <h3><?php print t('Is from of:') ?></h3>
 <h3><?php print t('Is part of series:') ?></h3>
 <h3><?php print t('Is part of series URI:') ?></h3>
 <h3><?php print t('Is part of:') ?></h3>
 <h3><?php print t('Is part of URI:') ?></h3>
 <h3><?php print t('Has part:') ?></h3>
 <h3><?php print t('Haer part URI:') ?></h3>
 <h3><?php print t('Is based on:') ?></h3>
 <h3><?php print t('Is based on URI:') ?></h3>
 <h3><?php print t('Is referenced by:') ?></h3>
 <h3><?php print t('Is referenced by URI:') ?></h3>
 <h3><?php print t('Requires:') ?></h3>
 <h3><?php print t('Requires URI:') ?></h3>
 <h3><?php print t('Replaces:') ?></h3>
 <h3><?php print t('Replaces URI:') ?></h3>
 <h3><?php print t('Is Replaced by:') ?></h3>
 <h3><?php print t('Is Replaced by URI:') ?></h3>
 <h3><?php print t('Has version:') ?></h3>
 <h3><?php print t('Has version URI:') ?></h3>
 <h3><?php print t('Is version of:') ?></h3>
 <h3><?php print t('Is version of URI:') ?></h3>
 <h3><?php print t('Alternative title:') ?></h3>
 <h3><?php print t('Identifiers:') ?></h3>
 <h3><?php print t('ISBN:') ?></h3>
 <h3><?php print t('ISSN:') ?></h3>
 <h3><?php print t('Identifier:') ?></h3>
 <h3><?php print t('Edition:') ?></h3>
 <h3><?php print t('Citation:') ?></h3>
 <h3><?php print t('Government Document Number:') ?></h3>
 <h3><?php print t('Other Identifier:') ?></h3>
 <h3><?php print t('International Standard Music Number:') ?></h3>
 <h3><?php print t('Uniform Resource Locator:') ?></h3>
 <h3><?php print t('Serial item and Contribution Identifier:') ?></h3>
 <h3><?php print t('Grant or Proposal Number:') ?></h3>
 <h3><?php print t('DOI:') ?></h3>
 <h3><?php print t('Description:') ?></h3>
 <h3><?php print t('Table of Contents:') ?></h3>
 <h3><?php print t('Description:') ?></h3>
 <h3><?php print t('Affiliation:') ?></h3>
 <h3><?php print t('Description URI:') ?></h3>
 <h3><?php print t('Sponsor:') ?></h3>
 <h3><?php print t('Language:') ?></h3>
 <h3><?php print t('Date Accessioned:') ?></h3>
 <h3><?php print t('Date Created:') ?></h3>
 <h3><?php print t('Date Available:') ?></h3>
 <h3><?php print t('Submission date:') ?></h3>
 <h3><?php print t('Date of Publication:') ?></h3>
 <h3><?php print t('Type:') ?></h3>
 <h3><?php print t('Time accessed:') ?></h3>
 <h3><?php print t('Rights:') ?></h3>
 -->
 
  <?php if (!empty($subject)): ?>
    <div id="subject" class="overview-field">
      <h3><?php print t('Subject Heading(s):') ?></h3>
      <div id="subject-content" class="overview-field-content"><?php print print_r($subject, TRUE); ?></div>
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
</div>
