<?php
include_once("includes/config.php");
include_once("includes/fun.php");

try {
    if (isset($_POST['package_id'])) {
        $package_id = intval($_POST['package_id']);
        $sql = "SELECT * FROM healthcheckup_packages_service_map psm
                JOIN healthCheckUp_packages p ON psm.packageID = p.packageID
                JOIN healthCheckup_service s ON psm.serviceID = s.serviceID
                WHERE psm.packageID = $package_id AND psm.status = 1"; 
        $result = $con->query($sql);

        if ($result === false) {
            throw new Exception("Query execution failed: " . $con->error);
        }

        if ($result->num_rows > 0) {
            $serviceName = [];
            while ($row = $result->fetch_assoc()) {
                $serviceName[] = $row['serviceName'];
            }
            sort($serviceName);
            list($part1, $part2, $part3) = divideArray($serviceName);

            $html = "<div class='details'>
                        <div class='details-list'>
                            <div>";
            foreach ($part1 as $item) {
                $html .= "<p>{$item}</p>";
            }
            $html .= "</div>
                    <div>";
            foreach ($part2 as $item) {
                $html .= "<p>{$item}</p>";
            }
            $html .= "</div>
                    <div>";
            foreach ($part3 as $item) {
                $html .= "<p>{$item}</p>";
            }
            $html .= "</div>
                    </div>
                </div>";
            echo $html;
        } else {
            echo "No data found";
        }
    } else {
        echo "Invalid request";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$con->close();
?>