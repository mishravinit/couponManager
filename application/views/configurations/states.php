<div>
    <h2>Update Terms and Conditions</h2>
    <table border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>City</td>
                <td>State</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($results as $data) {
                    echo "<tr>";
                    echo "<td>{$data->city_id}</td>";
                    echo "<td>{$data->city_name}</td>";
                    echo "<td>{$data->city_state}</td>";
                    echo "</tr>";                    
                }
            ?>    
        </tbody>        
    </table>    
    <p><?php echo $links; ?></p>
</div>