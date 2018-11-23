<table border="2" style= "background-color: #84ed86; color: #761a9b; margin: 0 auto;" >
              <tr>
                <th><b>TIME</b></th>
                <th><b>Monday</b></th>
                <th><b>Tuesday</b></th>
                <th><b>Wednesday</b></th>
                <th><b>Thursday</b></th>
                <th><b>Friday</b></th>
              </tr>
            <tbody>

                <?php
                    //error_reporting(1);
                    session_start();
                    //if ((isset($_SESSION['login'])) && (isset($_REQUEST['cls']))) {
                       // $classname = $_REQUEST['cls'];
                        $_headID=$_GET['headID'];
                        $conn = mysqli_connect("localhost", "afsar", "afsar123", "hms");
                        $sql = "select DISTINCT (Time) as Time from consultation_schedule Natural join doctor where dept_ID =1";
                        $rest = mysqli_query($conn, $sql);
                        while($t = mysqli_fetch_assoc($rest)){
                        $sql = "select * from consultation_schedule Natural join doctor where dept_ID =1 AND Time = '".$t['Time']."'";
                        //print_r($sql);exit;
                        $res = mysqli_query($conn, $sql);
                        ?>
                        <tr>
                            <td><?php echo $t['Time'] ?></td>
                        <?php
                        $week_days = array('Monday','Tuesday','Wednesday','Thurshday','Friday');
                        $doctor = array();
                        while($row = mysqli_fetch_assoc($res)) {
                            $doctor[$row['day']] = $row;
                        }
                        foreach ($week_days as $day) {
                        ?>
                            <?php if (array_key_exists($day, $doctor)) { $row = $doctor[$day]; ?>
                            <td><?php echo $row['dr_id'] ?></td>
                            <?php } else { ?>
                            <td>    </td>
                            <?php } ?>
                        <?php    
                        }
                        ?>
                        </tr>
                             <?php
                    }    
                ?>
                </tbody>
            </table>