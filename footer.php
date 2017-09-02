<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package psrm
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <div class="footer-buffer clearfix">&nbsp;</div>
        <div class="row">
            <div class="col-sm-5 col-sm-offset-1" itemscope itemprop="http://www.schema.org/TouristAttraction">
                <span class="heading">Main Facility & Train Rides</span><br/>
                <span><a href="visitor-information/find-us/">Campo Depot</a></span><br/>
                <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <span class="address-line-1" itemprop="streetAddress">750 Depot Street</span><br/>
                    <span class="address-line-2"><span itemprop="addressLocality">Campo</span>, <span
                                itemprop="addressRegion">California</span> <span
                                itemprop="postalCode">91906</span></span><br/>
                </div>
                <span class="telephone" itemprop="telephone"><a
                            href="tel:6194789937">(619) 478-9937 <i>weekends only</i></a></span>
            </div>
            <div class="col-sm-5 col-sm-offset-1">
                <span class="heading">Business Office</span><br/>
                <span><a href="visitor-information/la-mesa-depot/">La Mesa Depot</a></span><br/>
                <span class="address-line-1">4695 Nebo Drive</span><br/>
                <span class="address-line-2">La Mesa, California 91941</span><br/>
                <span class="telephone"><a
                            href="tel:6194657776">(619) 465-PSRM (465-7776) <i>recorded information</i></a></span>
            </div>
        </div>
        <br/><br/>
        <p>
            <span><a href="https://www.guidestar.org/profile/95-2374478" target="_blank"><img src="https://widgets.guidestar.org/gximage2?o=8441150&l=v4" id="guidestar-logo" /></a> &copy;<?php echo date('Y'); ?> Pacific Southwest Railway Museum Association, Inc.</span>
        </p>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
