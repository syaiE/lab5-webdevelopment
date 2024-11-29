<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
    <style>
        table, th, td {
            border: 2px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Program</th>
            <th>Age</th>
        </tr>
        <?php
        $student = [
            [
                'name' => 'Alice',
                'program' => 'BIP',
                'age' => 21
            ],
            [
                'name' => 'Bob',
                'program' => 'BIS',
                'age' => 20
            ],
            [
                'name' => 'Raju',
                'program' => 'BIT',
                'age' => 22
            ]
        ];
        foreach ($student as $s) {
            echo "<tr>";
            echo "<td>" . $s['name'] . "</td>";
            echo "<td>" . $s['program'] . "</td>";
            echo "<td>" . $s['age'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

