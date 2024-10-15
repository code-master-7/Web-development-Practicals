<html><head><title>Student Registration</title></head><body><center><h1>Student Information</h1>
        <form method="post" action="action.php">
            <?php
            $con = mysqli_connect("localhost", "root", "", "test");
            $edit = isset($_GET['edit']) ? $_GET['edit'] : '';
            if ($edit) {
                $query = mysqli_query($con, "SELECT * FROM student WHERE EN='$edit'");
                $data = mysqli_fetch_array($query);
            }
            ?>
            <input type="hidden" name="En" value="<?php echo $edit ? $data['EN'] : ''; ?>">
            <table>
                <tr><td>Enrolment</td>
                    <td><input type="number" name="En" value="<?php echo $edit ? $data['EN'] : ''; ?>" placeholder="Enter enrolment" required></td></tr>
                <tr><td>First Name</td>
                    <td><input type="text" name="Fname" value="<?php echo $edit ? $data['Fname'] : ''; ?>" placeholder="Enter first name" required></td></tr>
                <tr><td>Semester</td>
                    <td><select name="Sem" required>
                        <?php for($i=1; $i<=6; $i++) { ?>
                            <option value="<?php echo $i; ?>" <?php echo $edit && $data['Sem'] == $i ? 'selected' : ''; ?>><?php echo $i; ?></option>
                        <?php } ?>
                    </select></td></tr>
                <tr><td>Percentage</td>
                    <td><input type="number" name="Pre" value="<?php echo $edit ? $data['Presentage'] : ''; ?>" placeholder="Enter percentage" required></td></tr>
                <tr><td colspan="2" align="center">
                        <input type="submit" name="<?php echo $edit ? 'update' : 'submit'; ?>" value="<?php echo $edit ? 'Update' : 'Submit'; ?>"></td></tr>
            </table>
        </form>

        <!-- Display Table -->
        <h2>Student Records</h2>
        <table border="1">
            <tr><th>Enrolment</th>
                <th>First Name</th>
                <th>Semester</th>
                <th>Percentage</th>
                <th>Actions</th></tr>
            <?php
            $query = mysqli_query($con, "SELECT * FROM student");
            while ($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $row['EN']; ?></td>
                <td><?php echo $row['Fname']; ?></td>
                <td><?php echo $row['Sem']; ?></td>
                <td><?php echo $row['Presentage']; ?></td>
                <td><a href="index.php?edit=<?php echo $row['EN']; ?>">Edit</a> | 
                    <a href="action.php?delete=<?php echo $row['EN']; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
    </center></body></html>
