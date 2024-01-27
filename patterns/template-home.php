<?php
/**
 * Title: Home template
 * Slug: ridge/template-home
 * Categories: front-page, home
 * Viewport width: 1400
 */
?>

<!-- wp:template-part {"slug":"header","area":"header"} /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"align":"wide","fontSize":"xx-large"} -->
<h1 class="wp-block-heading alignwide has-text-align-center has-xx-large-font-size">My name is Evelyn Harper. I'm a <em>fiction author</em> from Boone, North Carolina.</h1>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"var:preset|spacing|60"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"aspectRatio":"16/9","scale":"cover","className":"is-style-rounded"} -->
<figure class="wp-block-image is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/blue-ridge-mountatains.jpg" alt="" style="aspect-ratio:16/9;object-fit:cover"/><figcaption class="wp-element-caption">Blue Ridge Mountains of Shenandoah National Park by <a href="https://www.flickr.com/photos/40718898@N04/45869962751">Shutter Runner</a></figcaption></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>I'm Evelyn Harper, the mind behind enchanting worlds and intricate stories. Growing up in Willowbrook, my love for storytelling blossomed amid the whispers of the wind and rustling leaves. </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>My journey led me to Serenity University, where "Echoes of Eternity" marked my debut into weaving fantasy and reality. Best known for the "Sable Moon Chronicles" trilogy and "Whispers in the Mist," my tales transport readers to realms where imagination knows no bounds. </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Though elusive in the public eye, I've become a source of inspiration, hosting workshops and mentoring emerging writers. Through my words, I invite readers to embrace the magic of fiction and explore the boundless landscapes of the human imagination.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"footer"} /-->
