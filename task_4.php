<?php

$taskList=[

        ['dFlexClass'=>'d-flex mt-2',
         'title'=> 'My Tasks',
         'spanClass'=>'d-inline-block ml-auto',
         'data'=>'130 / 500',
         'progressClass'=>'progress progress-sm mb-3',
          'progressBarClass'=>'progress-bar bg-fusion-400',
            'role'=>'progressbar',
            'style'=>'width: 65%;',
            'ariaValuenow'=>'34',
            'ariaValuemin'=>'0',
            'ariaValuemax'=>'100'
        ],
    ['dFlexClass'=>'d-flex',
        'title'=> 'Transfered',
        'spanClass'=>'d-inline-block ml-auto',
        'data'=>'440 TB',
        'progressClass'=>'progress progress-sm mb-3',
        'progressBarClass'=>'progress-bar bg-success-500',
        'role'=>'progressbar',
        'style'=>'width: 34%;',
        'ariaValuenow'=>'34',
        'ariaValuemin'=>'0',
        'ariaValuemax'=>'100'
    ],
        ['dFlexClass'=>'d-flex',
        'title'=> 'Bugs Squashed',
        'spanClass'=>'d-inline-block ml-auto',
        'data'=>'77%',
        'progressClass'=>'progress progress-sm mb-3',
        'progressBarClass'=>'progress-bar bg-info-400',
        'role'=>'progressbar',
        'style'=>'width: 77%;',
        'ariaValuenow'=>'77',
        'ariaValuemin'=>'0',
        'ariaValuemax'=>'100'
    ],
        ['dFlexClass'=>'d-flex',
    'title'=> ' User Testing',
    'spanClass'=>'d-inline-block ml-auto',
    'data'=>'7 days',
    'progressClass'=>'progress progress-sm mb-g',
    'progressBarClass'=>'progress-bar bg-primary-300',
    'role'=>'progressbar',
    'style'=>'width: 84%;',
    'ariaValuenow'=>'84',
    'ariaValuemin'=>'0',
    'ariaValuemax'=>'100'
],
]

?>




<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                        <?php foreach ($taskList as $item):?>
                            <div class="<?php echo $item['dFlexClass'];?>">
                                <?php echo $item['title'];?>
                                <span class="<?php echo $item['spanClass'];?>"><?php echo $item['data'];?></span>
                            </div>
                            <div class="<?php echo $item['progressClass'];?>">
                                <div class="<?php echo $item['progressBarClass'];?>" role="<?php echo $item['role'];?>"
                                     style="<?php echo $item['style'];?>" aria-valuenow="<?php echo $item['ariaValuenow'];?>"
                                     aria-valuemin="<?php echo $item['ariaValuemin'];?>"
                                     aria-valuemax="<?php echo $item['ariaValuemax'];?>"></div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
