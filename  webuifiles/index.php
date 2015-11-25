<?php
    require_once('includes/tile.class.php');
    require_once('includes/ui.class.php');

    $ui = new UI();

    $ui->setTitle('SocialSpaces');

    $tiles = array(
        array(
            'name'        => 'Home',
            'thumbnail'   => '',
            'content'     => 'Feed',
            'url'         => 'tiles/blank.php',
            'size'        => '4x2',
            'theme'       => 'orange',
            'link'        => ''
        ),
        array(
            'name'        => 'VrAccess',
            'thumbnail'   => 'images/widget_scroll.png',
            'content'     => 'VrAccess',
            'url'         => 'tiles/blank.php',
            'size'        => '4x2',
            'theme'       => 'red',
            'link'        => ''
        ),
        array(
            'name'        => 'AvatarCustomisation',
            'thumbnail'   => 'images/widget_notification.png',
            'content'     => 'AvatarCustomisation',
            'url'         => 'tiles/tile002.php',
            'size'        => '2x2',
            'theme'       => 'darkblue',
            'link'        => ''
        ),
        array(
            'name'        => 'tile003',
            'thumbnail'   => 'images/widget_dialog.png',
            'content'     => 'tile003',
            'url'         => 'tiles/blank.php',
            'size'        => '2x2',
            'theme'       => 'blue',
            'link'        => ''
        ),
        array(
            'name'        => 'tile004',
            'thumbnail'   => 'images/widget_gallery.png',
            'content'     => 'tile004',
            'url'         => 'tiles/tile004.php',
            'size'        => '4x2',
            'theme'       => 'darkgreen',
            'link'        => ''
        ),
        array(
            'name'        => 'Post',
            'thumbnail'   => 'images/widget_editable.png',
            'content'     => 'Post',
            'url'         => 'tiles/typography.php',
            'size'        => '2x2',
            'theme'       => 'darkred',
            'link'        => ''
        ),
        array(
            'name'        => 'Message',
            'thumbnail'   => 'images/widget_tooltip.png',
            'content'     => 'Message',
            'url'         => 'tiles/tile006.php',
            'size'        => '2x2',
            'theme'       => 'green',
            'link'        => ''
        ),
        array(
            'name'        => 'tile007',
            'thumbnail'   => 'images/widget_map.png',
            'content'     => 'tile007',
            'url'         => 'tiles/blank.php',
            'size'        => '2x2',
            'theme'       => 'blue',
            'link'        => ''
        ),
        array(
            'name'        => 'tile008',
            'thumbnail'   => 'images/widget_file.png',
            'content'     => 'Create',
            'url'         => 'tiles/blank.php',
            'size'        => '2x2',
            'theme'       => 'darkblue',
            'link'        => ''
        ),
        array(
            'name'        => 'tile009',
            'thumbnail'   => 'images/widget_tag.png',
            'content'     => 'tile009',
            'url'         => 'tiles/blank.php',
            'size'        => '2x2',
            'theme'       => 'blue',
            'link'        => ''
        ),
        array(
            'name'        => 'tile010',
            'thumbnail'   => 'images/widget_chart.png',
            'content'     => 'tile010',
            'url'         => 'tiles/blank.php',
            'size'        => '2x2',
            'theme'       => 'darkblue',
            'link'        => ''
        ),
        array(
            'name'        => 'tile011',
            'thumbnail'   => '',
            'content'     => 'tile011',
            'url'         => 'tiles/blank.php',
            'size'        => '4x2',
            'theme'       => 'orange',
            'link'        => ''
        ),
        array(
            'name'        => 'iframe',
            'thumbnail'   => '',
            'content'     => 'iframe',
            'url'         => 'tiles/iframe.php',
            'size'        => '2x2',
            'theme'       => 'purple',
            'link'        => ''
        ),
        array(
            'name'        => '',
            'thumbnail'   => '',
            'content'     => '',
            'url'         => '',
            'size'        => '1x1',
            'theme'       => 'yellow',
            'colour'      => '#3B5B99',
            'link'        => ''
        ),
        array(
            'name'        => '',
            'thumbnail'   => '',
            'content'     => '',
            'url'         => '',
            'size'        => '1x1',
            'theme'       => 'yellow',
            'colour'      => '#00ACED',
            'link'        => ''
        ),
        array(
            'name'        => 'Extra Tile',
            'thumbnail'   => '',
            'content'     => 'Extra tile',
            'url'         => '',
            'size'        => '1x1',
            'theme'       => 'yellow',
            'colour'      => '#232323',
            'link'        => ''
        ),
        array(
            'name'        => 'Feed',
            'thumbnail'   => '',
            'content'     => '',
            'url'         => '',
            'size'        => '1x1',
            'theme'       => 'yellow',
            'link'        => ''
        )
    );

    function makeRandomTile($id, $size = '2x2') {
        $tile = array(
            'name'        => 'widget_000' . $id,
            'thumbnail'   => '',
            'content'     => '',
            'url'         => 'tiles/blank.php',
            'size'        => $size,
            'theme'       => 'grey',
            'link'        => ''
        );

        return $tile;
    }

    $blog_tile = array(
        'name'        => 'Videos',
        'thumbnail'   => '',
        'content'     => 'Videos',
        'url'         => 'tiles/blog.php',
        'size'        => '2x2',
        'theme'       => 'orange',
        'link'        => ''
    );

    $aboutme_tile = array(
        'name'        => 'About',
        'thumbnail'   => 'images/widget_aboutme.png',
        'content'     => 'About Us',
        'url'         => 'tiles/about.php',
        'size'        => '2x2',
        'theme'       => 'darkred',
        'link'        => ''
    );


    $tile_container1 = array(
        'size'  => 'full',
        'theme' => '',
        'tiles' => $tiles
    );
    $tile_container2 = array(
        'size'  => 'half',
        'theme' => '',
        'tiles' => array($blog_tile, $aboutme_tile, makeRandomTile(24), makeRandomTile(25), makeRandomTile(26), makeRandomTile(27))
    );
    $tile_container3 = array(
        'size'  => 'half',
        'theme' => '',
        'tiles' => array(makeRandomTile(31), makeRandomTile(32), makeRandomTile(33), makeRandomTile(34), makeRandomTile(35), makeRandomTile(36))
    );

    $ui->addTileContainer($tile_container1);
    $ui->addTileContainer($tile_container2);
    $ui->addTileContainer($tile_container3);

    $ui->printHeader();
    $ui->printTiles();
    $ui->printFooter();
?>