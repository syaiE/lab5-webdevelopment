<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab 5a Q1</title>
</head>
<body>
<style>
        table {
            width: 60%;
            border-collapse: collapse;
        }
        table,th, td {
            border: 1px solid black;
           
        }
        td{
            padding:10px;
            vertical-align:top;
        }

        }
        .section title{
            width:60px;
        }
    </style>
    <?php 
        $name = "Syaidatul Erisha binti Mohd Badrul";
        $matricNumber = "AI220084";
        $course = "Information Security";
        $yearOfStudy = "Year 3";
        $address = "Pasir Puteh, Kelantan";
    ?>

    <table>
        <tr>
            <td>Name</td>
            <td><?php echo "$name"; ?></td> 
        </tr>
        <tr>
            <td>Matric Number</td>
            <td><?php echo "$matricNumber"; ?></td>
        </tr> 
        <tr>
            <td>Course</td>
            <td><?php echo "$course"; ?></td> 
        </tr>
        <tr>
            <td>Year Of Study</td>
            <td><?php echo "$yearOfStudy"; ?></td> 
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo "$address"; ?></td> 
        </tr>
    </table>
    
</body>
</html>
