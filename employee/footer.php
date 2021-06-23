</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
       var dt_combines = $('#prodTable').DataTable({
            'paging' : true,
            'serverSide' : true,
            'lengthChange' : true,
            'searching' : true,
            'ordering' : true,
            'info' : true,
            'autoWidth' : true,
            'order' : [[1, "desc"]],
            'columns' : [
                {sWidth: '30%' },
                {sWidth: '30%' },
                {sWidth: '25%' },
                {sWidth: '15%' },
                {sWidth: '15%' },
                {sWidth: '15%' },
                {sWidth: '15%' },
                {sWidth: '15%' }
            ],
            pagingType: 'numbers',
            dom: 'lBfrtip',
            buttons: [
            ],
            "lengthMenu": [ [50,75,100,-1 ], [50,75,100, "All"] ],
            data: [
                [1, 2, 3, 4, 5, 6, 7, 8, 9]
            ]
        });
    //     $sql = "SELECT * FROM item ";
    //     $result = $con->query($sql);
    // // echo json_encode($result);
    // $data = [];
    // $i = 0;
    // while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
    //     $data[$i][0] = $rows[1];
    //     $data[$i][1] = $rows[2];
    //     $data[$i][2] = $rows[3];
    //     $data[$i][3] = $rows[4];
    //     $data[$i][4] = $rows[5];
    //     $data[$i][5] = $rows[6];
    //     $data[$i][6] = $rows[7];
    //     $data[$i][7] = $rows[8];
    //     $data[$i][8] = $rows[9];
    //     $i++;
    // }
    // mysqli_free_result($result);
	// mysqli_close($con); 
    // echo json_encode($data);

        $.ajax({
            // type: "POST",
            // url: "selectitem.php",
            // cache: false,
            // dataType: 'json',
            // success:function(obj){
            //     dt_combines.clear().draw();
            //     $.each(obj, function(index,data){
            //         dt_combines.row.add([
            //             data[0],
            //             data[1],
            //             data[2],
            //             data[3],
            //             data[4],
            //             data[5],
            //             data[6],
            //             data[7]
            //         ]);
            //     })
            //     dt_combines.draw();
            // },
            // error: function(xhr, status, error) {
            //     var errMsg = xhr.status +':' +xhr.statusText;
            //     alert(errMsg)
            // }
        })
    } );
</script>
</body>
</html>