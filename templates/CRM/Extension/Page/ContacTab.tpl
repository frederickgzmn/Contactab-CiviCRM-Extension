{literal}
<div ng-app="ContactTab" ng-controller="ContactCtrl">
    <table id="personals_list" class="display dataTable no-footer" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Page Title</th>
            <th>Status</th>
            <th>Contribution Page</th>
            <th>Event</th>
            <th>NO of Contributions</th>
            <th>Amount Raised</th>
            <th>Goal Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Page Title</th>
            <th>Status</th>
            <th>Contribution Page</th>
            <th>Event</th>
            <th>NO of Contributions</th>
            <th>Amount Raised</th>
            <th>Goal Amount</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <tr ng-repeat="x in campaignlist" ng-cloak>
            <td><a href=" {{x.pcpLink}} "> {{x.pcpTitle}} </a></td>
            <td> {{x.pcpStatus}} </td>
            <td> {{x.contribPage}} </td>
            <td> {{x.eventPage}} </td>
            <td ng-click="shows(x.pcpId)"  title="Click to get contributions list"  style="cursor: pointer; "> <a href="javascript:;"> {{x.noContribs}} </a></td>
            <td> {{x.pcpAmount}} </td>
            <td> {{'$'+x.pcpGoalAmount}} </td>
            <td>
            	<a href=" {{x.pcpEditLink}} ">Edit page</a>
                <div class="hides" id="c{{x.pcpId}}" style="display: none; background: white;top: 50%;left: 50%;height: auto;width: 243px;position: fixed;border-style: solid;">
                    <span style="display: block;text-align: right;padding-right: 5px;cursor: pointer;" ng-click="hides()" title="Click to close this window"> x </span>
                    <div style="background: #f6f6f2;">Contributions for: {{x.pcpTitle}}</div>
                    <ul ng-repeat="x2 in x.idscontributions" ng-cloak>
                        <li ng-bind-html="convertHtml(x2)"></li>
                    </ul>
                </div>
            </td>
        </tr>
    </tbody>
</table>

</div>
{/literal}