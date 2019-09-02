 <ul>
    <?php ?>
    <li class="text-muted menu-title">Navigation</li>
    <li><a href="index.php" class="waves-effect <?=($sub=='index')?'active':''?>"><i class="ti-home active"></i><span> Dashboard </span></a>
    </li>
    <li class="has_sub" ng-show="accountProfile.pages_access.equipment.value">
        <a href="#" class="waves-effect <?=($sub=='equipments')?'active':''?>"><i class="ti-write"></i>Equipment<span class="label label-success pull-right">5</span></a>
        <ul class="list-unstyled">
            <li><a href="fill_equipment.php" class="waves-effect ">Fill in Equipment</a></li>
            <li><a href="ackreciept.php">Acknowledgement Receipt</a></li>
            <li><a href="returnslip.php">Return Slip</a></li>
            <li><a href="reproperty.php">Re-property Acknowledgement Reciept</a></li>
            <li><a href="trackproperty.php">Track Property</a></li>
        </ul>
    </li>
    <li class="has_sub" ng-show="accountProfile.pages_access.report.value">
        <a href="#" class="waves-effect <?=($sub=='reports')?'active':''?>"><i class="ti-files"></i>Report<span class="label label-success pull-right">6</span></a>
        <ul class="list-unstyled">
            <li><a href="PAR_report.php">Property Acknowledgement Receipt</a></li>
            <li><a href="returnSlip_report.php">Property Return Slip</a></li>
            <li><a href="javascript:;">Inventory of Equipment</a></li>
            <li><a href="javascript:;">Summary of Newly Acquired Equipment</a></li>
            <li><a href="javascript:;">Inventory Reconcilation Under Property, Plant And Equipment</a></li>
            <li><a href="javascript:;">Property, Plant and Equipment Schedule</a></li>

        </ul>
    </li>
    <li class="has_sub" ng-show="accountProfile.pages_access.maintenance.value">
        <a href="#" class="waves-effect <?=($sub=='maintenance')?'active':''?>"><i class="ti  ti-settings"></i>Maintenance<span class="label label-success pull-right">9</span></a>
        <ul class="list-unstyled">
            <li><a href="brand.php">Brand</a></li>
            <li><a href="classification.php">Classification</a></li>
            <li><a href="model.php">Model</a></li>
            <li><a href="personnel.php">Personnel</a></li>
            <li><a href="department.php">Department</a></li>
            <li><a href="units.php">Units</a></li>
            <li><a href="type.php">Type</a></li>
            <li><a href="supply.php">Supplier</a></li>
            <li><a href="accountable.php">Accountable Officer</a></li>
        </ul>
    </li>
    <li class="has_sub" ng-show="accountProfile.pages_access.security.value">
        <a href="#" class="waves-effect <?=($sub=='security')?'active':''?>"><i class="ti ti-lock"></i>Security<span class="label label-success pull-right">1</span></a>
        <ul class="list-unstyled">
            <!-- <li><a href="javascript:;">Users</a></li> -->
            <li><a href="group.php">Group</a></li>
        </ul>
    </li>
</ul>