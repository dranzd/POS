<?php
    $dbInfo = require_once '../config/db.php';

    // Database connection info
    $dbDetails = [
        'host' => $dbInfo['host'],
        'user' => $dbInfo['username'],
        'pass' => $dbInfo['password'],
        'db'   => $dbInfo['database'],
        'port' => $dbInfo['port'],
    ];

    // DB table to use
        $table = 'item';
    // Table's primary key
        $primaryKey = 'itemid';

        $columns = array(


       array(
             'db'  => 'Qty',
                'dt'  => 0,
                'field' => 'Qty',
                'formatter' => function($a1, $row ) {

                    return '<a href="#">' . $a1 . '</a>';
                }
            ),
       array(
             'db'  => 'Unit',
                'dt'  => 1,
                'field' => 'Unit',
                'formatter' => function($a2, $row ) {

                    return '<a href="#">' . $a2 . '</a>';
                }
            ),


       array(
             'db'  => 'Description',
                'dt'  => 2,
                'field' => 'Description',
                'formatter' => function($a3, $row ) {

                    return '<a href="#">' . $a3 . '</a>';
                }
            ),

        array(
             'db'  => 'SerialNumber',
                'dt'  => 3,
                'field' => 'SerialNumber',
                'formatter' => function($a4, $row ) {

                    return '<a href="#">' . $a4 . '</a>';
                }
            ),

         array(
             'db'  => 'ModelNumber',
                'dt'  => 4,
                'field' => 'ModelNumber',
                'formatter' => function($a5, $row ) {

                    return '<a href="#">' . $a5 . '</a>';
                }
            ),

        array(
             'db'  => 'D_P',
                'dt'  => 5,
                'field' => 'D_P',
                'formatter' => function($a6, $row ) {

                    return '<a href="#">' . $a6 . '</a>';
                }
            ),

        array(
             'db'  => 'Remarks',
                'dt'  => 6,
                'field' => 'Remarks',
                'formatter' => function($a6, $row ) {

                    return '<a href="#">' . $a6 . '</a>';
                }
            ),

        array(
             'db'  => 'category',
                'dt'  => 7,
                'field' => 'category',
                'formatter' => function($a7, $row ) {

                    return '<a href="#">' . $a7 . '</a>';
                }
            ),


        array( 'db' => 'itemid', 'dt' => 8,'field' => 'itemid',
                    'formatter' => function( $d, $row ) {
                       return '<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edititem"><i class="fa fa-edit"></i> Edit</button> ';
                }),
         array( 'db' => 'itemid', 'dt' =>9,'field' => 'itemid',
                    'formatter' => function( $d1, $row ) {
                       return '<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delitem"><i class="fa fa-trash"></i> Delete</button>';
                })
          );

    $joinQuery = "FROM $table";

    require( '../employee/scripts/ssp.class.php' );

    // Output data as json format
    echo json_encode(
        SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery)
    );