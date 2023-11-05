                <div class="tab">
                <?php if($userSession[0]["designation"] == 1) { ?>
                <button class="tablinks" onclick="openTab(event, 'Tab1')">SUBJECTS</button>
                <button class="tablinks" onclick="openTab(event, 'Tab2')">SCHEDULE</button>
                <button class="tablinks" onclick="openTab(event, 'Tab3')">ATTENDANCE</button>
                <button class="tablinks" onclick="openTab(event, 'Tab4')">LOCATION</button>
                <?php } else if($userSession[0]["designation"] == 2) { ?>
                <button class="tablinks" onclick="openTab(event, 'Tab1')">SUBJECTS</button>
                <button class="tablinks" onclick="openTab(event, 'Tab2')">SCHEDULE</button>
                <button class="tablinks" onclick="openTab(event, 'Tab3')">ATTENDANCE</button>   
                <?php } else  { ?>
                <button class="tablinks" onclick="openTab(event, 'Tab1')">SUBJECTS</button>
                <button class="tablinks" onclick="openTab(event, 'Tab2')">SCHEDULE</button>
                <button class="tablinks" onclick="openTab(event, 'Tab3')">ATTENDANCE</button> 
                <button class="tablinks" onclick="openTab(event, 'Tab4')">MONITORING</button>  
                <?php } ?>
                </div>

                <div id="Tab1" class="tabcontent">
                <div id="gridSubject" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
                </div>

                <div id="Tab2" class="tabcontent">
                <div id="calendar"></div>
                </div>

                <div id="Tab3" class="tabcontent">
                <div id="gridAttendance" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
                </div>

                <div id="Tab4" class="tabcontent">
                <div id="gridWhereAbout" class="ag-theme-alpine" style="width: 100%; height: 500px;"></div>
                </div>