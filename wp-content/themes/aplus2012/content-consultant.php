<?php
/**
 * The template for displaying consultant content
 */
?>
<?php
  $url = $_SERVER["REQUEST_URI"];

  //consultant type field
  if(strpos($url,"college-admissions-consultants") !== false) {
    $consultantType = "College Admissions Consultants"; //1
    $consultantTypeID = 1;
  } elseif(strpos($url,"educational-psychologists-therapists") !== false) {
    $consultantType = "Educational Psychologists"; //2
    $consultantTypeID = 2;
  } else {
    $consultantType = "Specialized Consultants"; //3
    $consultantTypeID = 3;
  }
  $consultantDBtype = ltrim(rtrim(types_render_field("consultant-type", array('output' => 'raw'))));
  if( $consultantDBtype == $consultantTypeID) : ?>
<?php $consultantName = types_render_field("consultant-first", array('output' => 'raw')) . " " . types_render_field("consultant-last", array('output' => 'raw')); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<div class="consultant-listing">

<?php
echo '<h3 class="consultantName">' . $consultantName . '</h3>';
echo '<div class="consultantTitleGroup">';
if (types_render_field("consultant-professional-title", array('output' => 'raw' ) ) != null) {
echo types_render_field("consultant-professional-title", array('output' => 'raw' ) ) . "<br/>";
}
echo types_render_field("consultant-organization", array('output' => 'raw') );
echo '</div><!--/.consultantTitleGroup-->';

echo '<address>' . types_render_field("consultant-street-address1", array('output' => 'raw') );
if (types_render_field("consultant-street-address2", array('output' => 'raw' ) ) != null) {
echo "<br/>" . types_render_field("consultant-street-address2", array('output' => 'raw' ) );
}
if (types_render_field("consultant-city", array('output' => 'raw' ) ) != null) {
echo "<br/>" . types_render_field("consultant-city", array('output' => 'raw' ) ) . ", ";
}
if (types_render_field("consultant-state", array('output' => 'raw' ) ) != null) {
echo types_render_field("consultant-state", array('output' => 'raw' ) ) . "&nbsp;&nbsp;";
}
if (types_render_field("consultant-zip", array('output' => 'raw' ) ) != null) {
echo types_render_field("consultant-zip", array('output' => 'raw' ) );
}
echo '</address>';

if (types_render_field("consultant-phone", array('output' => 'raw' ) ) != null) {
echo '<div class="contactInfoRow"><span class="consultantFieldTitle">Phone: </span>' . types_render_field("consultant-phone", array('output' => 'raw' ) ) . '</div>';
}
if (types_render_field("consultant-fax", array('output' => 'raw' ) ) != null) {
echo '<div class="contactInfoRow"><span class="consultantFieldTitle">Fax: </span>' . types_render_field("consultant-fax", array('output' => 'raw' ) ) . '</div>';
}
if (types_render_field("consultant-email", array('output' => 'raw' ) ) != null) {
echo '<div class="contactInfoRow"><span class="consultantFieldTitle">Email: </span>' . types_render_field("consultant-email", array('output' => 'raw' ) ) . '</div>';
}
if (types_render_field("consultant-url", array('output' => 'raw' ) ) != null) {
$consultantEmail = types_render_field("consultant-url", array('output' => 'raw', 'raw'=>'true' ) );
echo '<div class="contactInfoRow"><span class="3rdPartyWebsite"><a href="http://' . $consultantEmail . '" target="_blank">' . $consultantEmail . '</a></span></div>';
}

?>

      </div><!--/.consultant-listing-->
    </div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->

<?php endif; ?>