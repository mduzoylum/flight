<html>
<head>
    <title>Data Tables</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .box {
            width: 1000px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 25px;
        }
    </style>
</head>
<body>
<div class="container box">
    <h1 align="center">Flight Logs</h1>
    <br/>
    <div>
        <br/>
        <table id="user_data" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Flight Log Id</th>
                <th>Airline Code</th>
                <th>Scheduled</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Captain</th>
                <th>Status</th>
            </tr>
            </thead>
        </table>

    </div>
</div>
</body>
</html>


<script type="text/javascript" language="javascript">
    $(document).ready(function () {
        $('#add_button').click(function () {
            $('#user_form')[0].reset();
            $('.modal-title').text("Add User");
            $('#action').val("Add");
            $('#operation').val("Add");
        });

        var dataTable = $('#user_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "System/Handlers/FlightLogsHandlers.php",
                type: "POST"
            }
        });
    });
</script>