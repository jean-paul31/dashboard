<header>
    <div class="container text-center homeStyle">
        <div class="row">
            <?php if (isset($_SESSION['id'])) { ?>
            <div>
                <h1 class="title text-center">Page d'accueil</h1>
            </div>
        </div>
    </div>
</header> 
 
<br>
<br>
<br>

<section id="section1">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-4">
                <H2 class="title">Liens utiles</H2>
                <ul class="list-group list-group-flush box2">
                    <li class="list-group-item link"><a class="style" href="https://proactionca.ent.cgi.com/jira/servicedesk/customer/portal/35" target="_blank"><img src="src/view/asset/SDesk.png" alt="" srcset="" width="32px" height="32px"> Support Portal</a></li>
                    <li class="list-group-item link"><a class="style" href="https://proactioneu.ent.cgi.com/jira/secure/Tempo.jspa#/my-work/week?type=TIME" target="_blank"><img src="src/view/asset/tempo.jpg" alt="" srcset="" width="32px" height="32px"> Imputation tempo</a></li>
                    <li class="list-group-item link"><a class="style" href="https://proactionca.ent.cgi.com/jira/servicedesk/customer/portal/35/create/2093" target="_blank"><img src="src/view/asset/SDesk.png" alt="" srcset="" width="32px" height="32px"> Grant jira access</a></li>
                    <li class="list-group-item link"><a class="style" href="https://proactionca.ent.cgi.com/confluence/pages/viewpage.action?pageId=11020272" target="_blank"><img src="src/view/asset/confluence.png" alt="" srcset="" width="32px" height="32px"> Base de connaissances de la corp</a></li>
                    <li class="list-group-item link"><a class="style" href="https://proactioneu.ent.cgi.com/confluence/display/FGDCASOPSU" target="_blank"><img src="src/view/asset/confluence.png" alt="" srcset="" width="32px" height="32px"> Base de connaissances asopsu</a></li>
                    <li class="list-group-item link"><a class="style" href="https://proactioneu.ent.cgi.com/confluence/display/FGDCASOP/WSE-FGDC-ASOP+Home" target="_blank"><img src="src/view/asset/confluence.png" alt="" srcset="" width="32px" height="32px"> Base de connaissances asop</a></li>
                </ul>
            </div>
            <div class="col-2">
                    <H2 class="title text-center">Instances</H2>
                    <ul class="list-group list-group-flush box2">
                        <li class="list-group-item link"><a class="style" href="https://proactioneu.ent.cgi.com/jira/projects/FGDCASOPSU/queues/custom/5734" target="_blank"><img src="src/view/asset/jira.png" alt="" srcset="" width="32px" height="32px">Europe</a></li>
                        <li class="list-group-item link"><a class="style" href="https://proactionfr.ent.cgi.com/jira/projects/ASOPSUVIT/queues/custom/3759" target="_blank"><img src="src/view/asset/jira.png" alt="" srcset="" width="32px" height="32px">France</a></li>
                        <li class="list-group-item link"><a class="style" href="https://proactioncapoc.ent.cgi.com/jira/projects/FGDCASOPSU/queues/custom/3022" target="_blank"><img src="src/view/asset/jira.png" alt="" srcset="" width="32px" height="32px">POC</a></li>
                        <li class="list-group-item link"><a class="style" href="https://proactionca.ent.cgi.com/jira/secure/RapidBoard.jspa?rapidView=4431" target="_blank"><img src="src/view/asset/jira.png" alt="" srcset="" width="32px" height="32px">Canada</a></li>                    
                        <li class="list-group-item link"><a class="style" href="https://proactioncauat.ent.cgi.com/jira/projects/FGDCASOPSD/welcome-guide" target="_blank"><img src="src/view/asset/jira.png" alt="" srcset="" width="32px" height="32px">UAT</a></li>
                    </ul>          
            </div>
            <div class="col-2">
                <H2 class="title">Outils ASOP</H2>
                <ul class="list-group list-group-flush box2">
                    <li class="list-group-item link"><a class="style" href="https://proactioneu.ent.cgi.com/gitlab/wse/users/sign_in" target="_blank"><img src="src/view/asset/gitlab.png" alt="" srcset="" width="32px" height="32px"> Gitlab EU</a></li>
                    <li class="list-group-item link"><a class="style" href="https://proactionfr.ent.cgi.com/gitlab/fr/users/sign_in" target="_blank"><img src="src/view/asset/gitlab.png" alt="" srcset="" width="32px" height="32px"> Gitlab FR</a></li>
                    <li class="list-group-item link"><a class="style" href="https://support.atlassian.com/cloud-automation/docs/smart-values-in-jira-automation/" target="_blank">Doc smart value</a></li>
                    <li class="list-group-item link"><a class="style" href="https://proactionfr.ent.cgi.com/crowd/console/login.action?next=%2Fconsole%2Fsecure%2Fconsole.action#/" target="_blank"><img src="src/view/asset/crowd.jpg" alt="" srcset="" width="32px" height="32px"> Crowd FR</a></li>
                    <li class="list-group-item link"><a class="style" href="https://proactionca.ent.cgi.com/grafana/login" target="_blank"><img src="src/view/asset/grafana.png" alt="" srcset="" width="32px" height="32px"> Grafana</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- <br>
<br>
<br>
<section id="section2">
    <div class="container d-flex justify-content-md-center text-center">
        <div class="row">
            <div class="col">
                    <H2 class="title">Liens utiles</H2>
                    <ul class="list-group list-group-flush box">
                        <li class="list-group-item link"><a class="style" href="https://proactionca.ent.cgi.com/jira/servicedesk/customer/portal/35" target="_blank"><img src="src/view/asset/SDesk.png" alt="" srcset="" width="32px" height="32px"> Support Portal</a></li>
                        <li class="list-group-item link"><a class="style" href="https://proactioneu.ent.cgi.com/jira/secure/Tempo.jspa#/my-work/week?type=TIME" target="_blank"><img src="src/view/asset/tempo.jpg" alt="" srcset="" width="32px" height="32px"> Imputation tempo</a></li>
                        <li class="list-group-item link"><a class="style" href="https://proactionca.ent.cgi.com/jira/servicedesk/customer/portal/35/create/2093" target="_blank"><img src="src/view/asset/SDesk.png" alt="" srcset="" width="32px" height="32px"> Grant jira access</a></li>
                        <li class="list-group-item link"><a class="style" href="https://proactionca.ent.cgi.com/confluence/pages/viewpage.action?pageId=11020272" target="_blank"><img src="src/view/asset/confluence.png" alt="" srcset="" width="32px" height="32px"> Base de connaissances de la corp</a></li>
                        <li class="list-group-item link"><a class="style" href="https://proactioneu.ent.cgi.com/confluence/display/FGDCASOPSU" target="_blank"><img src="src/view/asset/confluence.png" alt="" srcset="" width="32px" height="32px"> Base de connaissances asopsu</a></li>
                        <li class="list-group-item link"><a class="style" href="https://proactioneu.ent.cgi.com/confluence/display/FGDCASOP/WSE-FGDC-ASOP+Home" target="_blank"><img src="src/view/asset/confluence.png" alt="" srcset="" width="32px" height="32px"> Base de connaissances asop</a></li>
                    </ul>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<br>
<section id="section3">
    <div class="container d-flex justify-content-md-center text-center">
        <div class="row">
            <div class="col">
                    <H2 class="title">Outils ASOP</H2>
                    <ul class="list-group list-group-flush box2">
                        <li class="list-group-item link"><a class="style" href="https://proactioneu.ent.cgi.com/gitlab/wse/users/sign_in" target="_blank"><img src="src/view/asset/gitlab.png" alt="" srcset="" width="32px" height="32px"> Gitlab EU</a></li>
                        <li class="list-group-item link"><a class="style" href="https://proactionfr.ent.cgi.com/gitlab/fr/users/sign_in" target="_blank"><img src="src/view/asset/gitlab.png" alt="" srcset="" width="32px" height="32px"> Gitlab FR</a></li>
                        <li class="list-group-item link"><a class="style" href="https://support.atlassian.com/cloud-automation/docs/smart-values-in-jira-automation/" target="_blank">Doc smart value</a></li>
                        <li class="list-group-item link"><a class="style" href="https://proactionfr.ent.cgi.com/crowd/console/login.action?next=%2Fconsole%2Fsecure%2Fconsole.action#/" target="_blank"><img src="src/view/asset/crowd.jpg" alt="" srcset="" width="32px" height="32px"> Crowd FR</a></li>
                        <li class="list-group-item link"><a class="style" href="https://proactionca.ent.cgi.com/grafana/login" target="_blank"><img src="src/view/asset/grafana.png" alt="" srcset="" width="32px" height="32px"> Grafana</a></li>
                    </ul>
            </div>
        </div>
    </div>
</section> -->
    <?php } else { 
        header("Location:login");
    } ?>
    </div>
</div>

