<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Configurator
 */

?>
	</div> <!-- End of page-gradient -->
	</div> <!-- End of Main Wrap -->

		</div>
		<?php get_template_part( 'templates/footer/footer', 'info' ); ?>

	</div> <!-- #content-pusher -->

</div> <!-- #page -->

<?php wp_footer(); ?>

</body>
</html>


<script>
    jQuery( "div" ).click(function() {

        //
        let topCase = jQuery("[data-parent-uid ='jcrW-ajGu']");

        let MotoGialloEstate = jQuery("[data-uid='2o7u-SdrE']");
        let MotoBiancoInnocenza = jQuery("[data-uid='i9zV-K8aQ']");
        let MotoNeroLucido = jQuery("[data-uid='Wo2d-Ego2']");
        let MotoRossoPassione = jQuery("[data-uid='LKEv-pE1n']");

        let GialloEstate = jQuery("[data-uid='xfAo-ICEL']");
        let BiancoInnocenza = jQuery("[data-uid='8rce-TlWw']");
        let NeroLucido = jQuery("[data-uid='aQ93-sSfI']");
        let RossoPassione = jQuery("[data-uid='bnTm-7a68']");

        if  (MotoGialloEstate.is(".current")) {
            GialloEstate.css("display", "");
            BiancoInnocenza.css("display", "none");
            NeroLucido.css("display", "none");
            RossoPassione.css("display", "none");
            topCase.appendImagetoPreview().reset();
            //jQuery( "#garageDesign" ).load( "https://192.168.64.2/vespalab/produkt/vespa-gts-super-125-rst/ #garageDesignMoto");
        }

        if  (MotoBiancoInnocenza.is(".current")) {
            GialloEstate.css("display", "none");
            BiancoInnocenza.css("display", "");
            NeroLucido.css("display", "none");
            RossoPassione.css("display", "none");
        }

        if  (MotoNeroLucido.is(".current")) {
            GialloEstate.css("display", "none");
            BiancoInnocenza.css("display", "none");
            NeroLucido.css("display", "");
            RossoPassione.css("display", "none");
        }

        if  (MotoRossoPassione.is(".current")) {
            GialloEstate.css("display", "none");
            BiancoInnocenza.css("display", "none");
            NeroLucido.css("display", "none");
            RossoPassione.css("display", "");
        }
    });

</script>
