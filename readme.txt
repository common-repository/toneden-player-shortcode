=== ToneDen Player Shortcode ===
Contributors: elsbree
Tags: toneden, music, player, soundcloud
Requires at least: 3.0.1
Tested up to: 3.0.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Enables shortcode to embed ToneDen's new SoundCloud player in WordPress blogs.

== Description ==

We built a sweet new version of the SoundCloud embeddable player! Check out the details at https://www.toneden.io/player. This plugin will let you embed our player into your WordPress blog just as easily as the SoundCloud player- in fact, if you've used the SoundCloud Shortcode Plugin, you can replace the [soundcloud] tags with [tonedenplayer] tags and the ToneDen player will automatically replace the SoundCloud player (though any custom styles you applied to the SoundCloud player won't apply to the ToneDen player).

== Installation ==

1. Upload the `toneden-player-shortcode` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Create an HTML `<div>` where you want to render the player, and give it a unique id, e.g. `<div id="player">player will render here</div>`.
1. Embed the player with shortcode: `[tonedenplayer dom="#player" skin="light" visualizertype="waves"]https://soundcloud.com/flume/sintra[/tonedenplayer]`.
1. You can provide SoundCloud tracks as a comma-separated list of URLs. The URLs can point to an artist, set, single track, or any combination of the three. The URLs parameter can be provided either between the [toneden] tags (`[tonedenplayer dom="#player"]https://soundcloud.com/giraffage,https://soundcloud.com/flume/sintra[/tonedenplayer]`) or as a 'urls' parameter in the shortcode (`[tonedenplayer dom="#player" urls="https://soundcloud.com/giraffage,https://soundcloud.com/flume/sintra"]`).

== Frequently Asked Questions ==

= This is too technical! Help. =

Feel free to email us at support (at) toneden.io if you need any help setting up the player.

= How can I customize the player? =

You can choose from 4 different skins, and 2 different visualizer types. For a more extensive overview of the different configuration parameters available, view the documentation at https://github.com/ToneDen/toneden-sdk. NOTE: Parameters that are in camelCase in the GitHub documentation are in all lowercase in the shortcode version.

= What's ToneDen? =

Good question. We make it really easy to turn musicians' SoundCloud accounts into awesome websites, and give them the tools they need to market themselves.

== Screenshots ==

1. This is the 'light' theme with the 'bars' visualizer.
2. This is the 'aurora' theme.

== Changelog ==

= 0.1 =
Initial version.
