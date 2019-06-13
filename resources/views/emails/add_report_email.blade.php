<div>
<p>Dear <?php echo $manager_info->first_name; ?>, <br>
You have a tire/wheel end job to inspect, please see below for details.</p>

<table style="font-size: large;">
    <tbody>
        <tr style="background-color: #f3f2f1;">
            <td style="width: 50%;">Vehicle Type</td>
            <td><?php echo $report_detail->vehicle_type?></td>
        </tr>
        <tr>
            <td style="width: 50%;">Weight</td>
            <td><?php echo $report_detail->weight; ?></td>
        </tr>
        <tr style="background-color: #f3f2f1;">
            <td style="width: 50%;">Unit Number</td>
            <td><?php echo $report_detail->report_unit_num; ?></td>
        </tr>
        <tr>
            <td style="width: 50%;">Tech Name</td>
            <td><?php echo $report_detail->name; ?></td>
        </tr>
        <tr style="background-color: #f3f2f1;">
            <td style="width: 50%;">Manager</td>
            <td><?php echo $manager_info->first_name.' '.$manager_info->last_name; ?></td>
        </tr>
        <tr>
            <td style="width: 50%;">Comments</td>
            <td><?php echo $report_detail->comment; ?></td>
        </tr>
    </tbody>
</table>

<p><a href="" target="_blank"></a></p>

<p>Thank you.</p>
</div>