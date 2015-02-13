=== There Can Be Only One  ===
Contributors: bald_technologist
Tags: posts, sticky
Requires at least: 4.0
Tested up to: 4.1
Stable tag: 4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Ensures that there is only one published sticky post on the site at any given time.

== Description ==
This plugin ensures that there is only one sticky post published to the site. When a new sticky post is published, previous the 'sticky' flag is removed from any other posts, so they will no longer appear at the top of your page.


== Installation ==
1. Extract the single-sticky/ folder file to /wp-content/plugins/
2. Activate the plugin at your blog's Admin -> Plugins screen
3. Publish a new post that is marked as being sticky.

== Important Notes ==
* I adapted code initially found at http://craiget.com/one-sticky-post-in-wordpress/ Thanks to Craige for posting it! Also, Devin Price (http://wptheming.com/) was immensely helpful as I knocked out a couple of issues regarding scheduled sticky posts.
* The first time you publish a sticky post after enabling this plugin, any and *all* other sticky posts will be changed to not-sticky. There is not a way to automatically reverse this decision, nor is their a log of which posts were changed.
* This plugin has not been tested with versions of WordPress prior to 4.0.
* Do not use this plugin if you are using another to manage per-category sticky posts. It has not been tested with that setup, and it will most likely mark all of those posts as non-sticky.

== Frequently Asked Questions ==

= How does the plugin treat scheduled posts? =
If you have a sticky post visible on the site and you schedule a new sticky post, the old one will stay sticky until the new one is published and visible on the site.

= How does this work with plugins that set sticky posts per category? =
Sorry, the short answer is "I don't know", as I haven't tested it with any of those plugins. My expectation is that all of those sticky posts will be set to non-sticky the first time a new sticky post is published after this plugin is activated. I recommend you avoid this situation, but if you decide to try it, I'd love to hear the results.

== Changelog ==

= 0.9 =
* Initial public release.