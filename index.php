<?php
    include_once( 'usage.php' );

    $json=doSearch( 'php', 'composer', 'hot', 2);
    $data =  json_decode($json);

    ?>

<html>
<head>
<title>Reddit Search Table</title>

<link rel="stylesheet" type="text/css" href="resources/style.css">
</head>

<body>
<?php
    if (count($data->data->children)) {
        // Open the table
        echo "<table id='posts'>";
        echo "<tr>";
        echo "<th>Title</th>";
        echo "<th>Ups</th>";
        echo "<th>Downs</th>";
        echo "<th>Created At</th>";
        echo "<th>Subreddit</th>";
        echo "<th>Number of Comments</th>";
        echo "<th>Link</th>";
        echo "</tr>";

        // Cycle through the array
        foreach ($data->data->children as $res) {
            // Output a row
            echo "<tr>";
            echo "<td>" . $res->data->title . "</td>";
            echo "<td>" . $res->data->ups . "</td>";
            echo "<td>" . $res->data->downs . "</td>";
            echo "<td>" . $res->data->created_utc . "</td>";
            echo "<td>" . $res->data->subreddit . "</td>";
            echo "<td>" . $res->data->num_comments . "</td>";
            echo "<td>" . $res->data->permalink . "</td>";
            echo "</tr>";
        }

        // Close the table
        echo "</table>";
    }
?>
</body>
</html>