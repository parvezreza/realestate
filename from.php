<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="js/validation/jquery.validationEngine.js"></script>
<script src="/js/validation/jquery.validationEngine-en.js"></script>
<script src="js/validation/ticker00.js"></script>
<script src="js/validation/maestro.min.js"></script>
<link rel="stylesheet" href="js/custom-theme/jquery-ui-1.8.21.custom.css" type="text/css" />
<link rel="stylesheet" href="js/validation/validationEngine.jquery.css"  type="text/css"/>
 <script type="text/javascript">
        $(document).ready(function() {
            $('#username').keyup(function(){
                this.value = this.value.toLowerCase().replace(/ /g,'');
            });
            $('#slider').hide();
            $("#checkPublish").hide()
            $("#checkResult").hide()

            $.ajax({
                        url:'/homePageNotice/listActiveHomePageNotice',
                        method:'post',
                        data:'json',
                        success:function(json) {
                            var helpNotice = '';
                            var width = 780;
                            width = width / json.length
                            $.each(json, function(key, val) {
                                //alert(key +"=="+val.active)

                                helpNotice = helpNotice +
                                        '<div style="float: left;width: ' + width + 'px;margin-left: 10px;">' +
                                        '<fieldset  class="ui-state-default ui-corner-all">' +
                                        '<div>' +
                                        '<div id="homePageNoticeTitleDiv"><h2>' + val.title + '</h2></div>' +
                                        '<br/>' +
                                        '<div id="homePageNoticeDescriptionDiv">' + val.description + '</div><br/>' +
                                        '</div>' +
                                        '</fieldset>' +
                                        '</div>';

                                $('#notice_holder').html(helpNotice)
                            });
                        }
                    });
            $.ajax({
                        url:'/admissionProcess/listOfPublishData',
                        method:'post',
                        data:'json',
                        success:function(json) {
                            if (json.isPublished) {
                                $("#checkPublish").show()
                            }
                            else {
                                $("#checkPublish").hide()
                            }
                        }
                    });
            $('#slider_content').maestro({
                        autoplay: true,
                        rStart: true,
                        timeout: 1000,
                        control: true,
                        nav: true,
                        pnav: true,
                        keynav: true,
                        width:780,
                        height:300
                    });
            $.ajax({
                        url:'/homePageImage/showImage',
                        method:'post',
                        data:'json',
                        success:function(json) {
                            $.each(json, function(key, val) {
                                if (val.active == true) {
                                    $('#slider').show();

                                } else {
                                    $('#slider').hide();
                                }
                            });

                        }
                    });

            $('#slider_header_content').list_ticker({
                        speed:5000,
                        effect:'fade'
                    });
            if ('' != '') {

                window.setTimeout("checkValueOfHomePage();", 4000);
            }

            $("#loginForm").validationEngine({   //    client side validation
                        isOverflown: true,
                        overflownDIV: ".ui-layout-center"
                    });
            $("#loginForm").validationEngine('attach');

//         addWidth()

            $.ajax({
                        url:'/admissionResultPublication/isResultPublished',
                        method:'post',
                        data:'json',
                        success:function(json) {
                            if (json.isResultPublished) {
                                $("#checkResult").show()
                            }
                            else {
                                $("#checkResult").hide()
                            }
                        }
                    });
        });
        function addWidth() {
            if ($('#homePageNoticeDiv').is(":visible")) {
                if ($('#homePageNotice2Div').is(":hidden") && $('#homePageNotice3Div').is(":hidden")) {
                    var mydiv1 = document.getElementById("homePageNoticeDiv");
                    var curr_width1 = parseInt(mydiv1.style.width); // removes the "px" at the end
                    mydiv1.style.width = (curr_width1 + 520) + "px";

                } else if ($('#homePageNotice2Div').is(":hidden")) {
                    var mydiv1 = document.getElementById("homePageNoticeDiv");
                    var curr_width1 = parseInt(mydiv1.style.width); // removes the "px" at the end
                    mydiv1.style.width = (curr_width1 + 130) + "px";
                    var mydiv3 = document.getElementById("homePageNotice3Div");
                    var curr_width3 = parseInt(mydiv3.style.width); // removes the "px" at the end
                    mydiv3.style.width = (curr_width3 + 130) + "px";

                } else if ($('#homePageNotice3Div').is(":hidden")) {
                    var mydiv1 = document.getElementById("homePageNoticeDiv");
                    var curr_width1 = parseInt(mydiv1.style.width); // removes the "px" at the end
                    mydiv1.style.width = (curr_width1 + 130) + "px";
                    var mydiv2 = document.getElementById("homePageNotice2Div");
                    var curr_width2 = parseInt(mydiv2.style.width); // removes the "px" at the end
                    mydiv2.style.width = (curr_width2 + 130) + "px";
                }
            }
            else if ($('#homePageNotice2Div').is(":visible") && $('#homePageNotice3Div').is(":visible")) {
                var mydiv2 = document.getElementById("homePageNotice2Div");
                var curr_width2 = parseInt(mydiv2.style.width); // removes the "px" at the end
                mydiv2.style.width = (curr_width2 + 130) + "px";
                var mydiv3 = document.getElementById("homePageNotice3Div");
                var curr_width3 = parseInt(mydiv3.style.width); // removes the "px" at the end
                mydiv3.style.width = (curr_width3 + 130) + "px";
            }
            else if ($('#homePageNotice3Div').is(":visible")) {
                var mydiv3 = document.getElementById("homePageNotice3Div");
                var curr_width3 = parseInt(mydiv3.style.width); // removes the "px" at the end
                mydiv3.style.width = (curr_width3 + 520) + "px";
            }
            else if ($('#homePageNotice2Div').is(":visible")) {
                var mydiv2 = document.getElementById("homePageNotice2Div");
                var curr_width2 = parseInt(mydiv2.style.width); // removes the "px" at the end
                mydiv2.style.width = (curr_width2 + 520) + "px";
            }
        }

     function loadLoginPage()
     {
         window.location="/authentication/login"
     }
      function loadResultPage()
     {
         window.location=" /admissionResultPublication/showAvailableResult"
     }

    </script>

    <title>B R A C&nbsp; U N I V E R S I T Y</title>
</head>

<form action='/j_spring_security_check' method='POST' id='loginForm'  autocomplete='on'>
    <body class="login-body">

    <div class="login-main-div">
            <div>
                <div class="content-left">
                    <img src="/images/header/BracAcademia.gif" alt="BracAcademia"
                         title="BracAcademia" border="0" class="header-image"/>
                </div>

                <div class="content-right" >
                    <img src="/images/layout/Logo.bmp" alt="Logo" title="Logo" border="0"
                         class="header-logo"/>
                </div>

                <div class="clear"></div>
            </div>

            <div class="login-body-div">

                    <div class="login-inner-body-div">
                        <div class="login-page-header-notice-div">
                            <div class="content-left"><img src="/images/header/header_notice.png"
                                                           class="login-header-notice-logo"/></div>

                            <div class="login-header-notice-div">
                                <div id="slider_header_content">
                                    
                                        
                                            <div class="login-hear-notice-text">EMBA Admission: Apply online for Summer 2012 intake<br></div>
                                        
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="slider" class="login-header-image-slide">
                        <div id="slider_content">
                            
                        </div>
                    </div>

                        <div class="login-body-content-div">
                            <div class="content-left login-fieldset-width">
                                <fieldset class="ui-state-default ui-corner-all">
                                    
                                    <div>
                                        <div class="login-body-title-text  login-line ">Sign In</div><br/>
                                        <div><label>E-mail Address</label></div>
                                           <div class="clear"></div>


                                                <div class="inputContainer">
                                                    <input type='text' name='j_username' class="validate[required,custom[email]]"
                                                           value="" id="username" style="text-transform: lowercase;"/>


                                                </div>
                                           <div class="clear"></div>
                                          <div class="content-left hints-text">yourname@gmail.com</div>

                                                <div class="clear"></div>



                                        <div><label>Password</label></div>
                                        <div class="clear"></div>

                                            <div class="inputContainer"><input type='password' name='j_password'
                                                                               id='password' value=""
                                                                               class="validate[required,min[6]]" /></div>


                                        <div class="clear"></div>

                                    </div>
                                    <br/>

                                    <div>
                                        <div class="content-left">
                                            <input type="submit"
                                                   class="ui-button  ui-widget ui-state-default ui-corner-all color-red"
                                                   value="Login"/>
                                        </div>

                                        <div class="content-left content-padding-left-top">
                                            <a  href="/authentication/showRecover">Forgot your password?</a>
                                        </div>

                                        <div class="clear"></div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="content-right login-fieldset-width" >
                                <div id="checkUserDiv">
                                    <fieldset class="ui-state-default ui-corner-all">
                                        <div >
                                            <div class="login-body-title-text  login-line">Create a New Account</div>

                                            <div class="content-left"><p>Don't have any account?</p>
                                            </div><br/>
                                             <div class="clear"></div>
                                            <div class="content-left">
                                                <a href="#"><input
                                                        type="button"
                                                        class="ui-button ui-widget ui-state-default ui-corner-all"
                                                        value="New User"/></a>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div id="checkPublish">
                                    <fieldset class="ui-state-default ui-corner-all">


                                            <div>
                                                <a href="#">
                                                    <input
                                                        type="button"
                                                        class="ui-button ui-widget ui-state-default ui-corner-all color-red content-left"
                                                        value="Apply Online" onclick="loadLoginPage();"/>
                                                   </a>
                                            </div>

                                    </fieldset>
                                </div>

                                <div id="checkResult">
                                    <fieldset class="ui-state-default ui-corner-all">
                                        <div >

                                            <div>
                                                <a
                                                   href="#"> <input
                                                        type="button"
                                                        class="ui-button ui-widget ui-state-default ui-corner-all color-red content-left"
                                                        value="Admission Result" onclick="loadResultPage();"/></a>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="clear"></div>
                        </div>



                 <div>
                    <div id="notice_holder" class="notice">

                    </div>

                    <div class="clear"></div>
                  </div>

                 <div class="clear"></div>
                  </div>

            <div>

                <div >Copyright © BRAC University 2011</div>

                <div class="clear"></div>
            </div>

    </div>

    </body>
</form>

</body>
</html>