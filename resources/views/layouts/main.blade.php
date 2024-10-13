<!-- this is for main jf.org -->
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from jsonformatter.org/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 04:04:19 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

@include('layouts.header')

<body id="page-top" class="index">
    <input type="hidden" id="viewname" value="index"><input type="hidden" id="type" value="json">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B5DLV1F39J"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-B5DLV1F39J');
    </script>
    <input id="default_file" type="file" name="userfile" />
    <div id="pluswrap" class="hide">
        <div class="plus"><button class="btn btn-lg btn-success"><i class="fa fa-cog fa-spin"></i></button></div>
    </div>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header page-scroll"><button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span></button><a class="navbar-brand" href="index.html"><img
                        src="{{ asset('theme/jsonformatter.org/img/logo.webp') }}" width="249px" height="39px"
                        alt="JSON Formatter" title="JSON Formatter"></a></div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll"><a href="https://codebeautify.org/jsonviewer" rel="noopener"
                            title="JSON Beautifier" target="_blank">JSON Beautifier</a></li>
                    <li class="page-scroll hidden-sm hidden-md"><a
                            href="{{ asset('theme/jsonformatter.org/json-parser.html') }}" title="JSON Parser">JSON
                            Parser</a></li>
                    <li class="page-scroll hidden-sm"><a
                            href="{{ asset('theme/jsonformatter.org/xml-formatter.html') }}" title="XML Formatter">XML
                            Formatter</a></li>
                    <li class="page-scroll hidden-sm hidden-md"><a href="jsbeautifier.html"
                            title="JSBeautifier">JSBeautifier</a></li>
                    <li id="savelink" class="page-scroll"><a href="#save" onclick="Action_Save();">Save</a></li>
                    <li class="page-scroll hidden-sm"><a href="recentLinksPage/json.html">Recent Links</a></li>
                    <li id="loginDiv" class="page-scroll"><a href="#" onclick="preLogin();"
                            title="New Login">Login</a></li>
                    <a data-toggle="dropdown" href="index.html#">
                        <li id="loginDropdown" class="dropdown cursor-pointer">
                            <span id="loggedUserName"></span><span class="caret"></span>
                            <ul class="dropdown-menu">
                                <li>
                                    <a target="_blank"
                                        href="{{ asset('theme/jsonformatter.org/userSaveLinkPage/json.html') }}">My
                                        Links</a>
                                </li>
                                <li><a href="index.html#" onclick="preLogout();">Logout</a></li>
                            </ul>
                    </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="flymessage" class="alert alert-danger flyover flyover-bottom">
        <p> Copied to Clipboard </p>
    </div>
    <header>
        @yield('content')
    </header>
    <section class="ads">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center">
                    <div align="center" data-freestar-ad="__336x280 __336x280" id="jsonformatter_leaderboard_1">
                        <script data-cfasync="false" type="text/javascript">
                            freestar.config.enabled_slots.push({
                                placementName: "jsonformatter_leaderboard_1",
                                slotId: "jsonformatter_leaderboard_1"
                            });
                        </script>
                    </div>
                </div>
                <div class="col-lg-5 text-center">
                    <div id="FreeStarVideoAdContainer">
                        <div id="freestar-video-parent">
                            <div id="freestar-video-child"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            <div id="ablocker-big">
                <div style="line-height: 1;"><span style="font-size: 18px;" data-nosnippet>Ad blocking? It's okay.
                        Please share to support us:</span></div>
                <div style="line-height: 1;"><span style="font-size: 18px;"><br></span></div>
                <ul class="list-inline">
                    <li> <a rel="noopener" title="Share on Facebook"
                            href="https://www.facebook.com/share.php?u=https://jsonformatter.org/" target="_blank"
                            class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i>Share</a> </li>
                    <li> <a rel="noopener" title="Tweet on Tweeter"
                            href="https://twitter.com/share?url=https://jsonformatter.org/&amp;text=I%20%e2%9d%a4%ef%b8%8f%20%40jsonformatter's%20JSON%20Formatter%20and%20JSON%20Validator"
                            target="_blank" class="btn-social btn-outline"><i
                                class="fa fa-fw fa-twitter"></i>Tweet</a> </li>
                    <li><a rel="noopener" title="Share on Linkedin"
                            href="https://www.linkedin.com/shareArticle?url=https://jsonformatter.org/"
                            target="_blank" class="btn-social btn-outline"><i
                                class="fa fa-fw fa-linkedin"></i>Share</a></li>
                    <li><a rel="noopener" title="Share on Reddit"
                            href="https://www.reddit.com/submit?url=https://jsonformatter.org/" target="_blank"
                            class="btn-social btn-outline"><i class="fa fa-fw fa-reddit"></i>Share</a></li>
                </ul>
            </div>
        </center>
    </section>
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>JSON Formatter</h1>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p><em>JSON Formatter</em> and <em>JSON Validator</em> help to auto <em>format JSON</em> and
                        validate your JSON text. It also provides a tree view that helps to navigate your formatted JSON
                        data.</p>
                    <ul>
                        <li>It helps to validate JSON online with Error Messages.</li>
                        <li>It's the only JSON tool that shows the image on hover on Image URL in a tree view.</li>
                        <li>It's also a <em>JSON Beautifier</em> that supports indentation levels: 2 spaces, 3 spaces,
                            and 4 spaces.</li>
                        <li>Supports Printing of JSON Data.</li>
                        <li>JSON File Formatter provides functionality to upload JSON file and download formatted JSON
                            File. This functionality helps to format json file.</li>
                        <li>95% of API Uses JSON to transfer data between client and server. This tools can works as API
                            formatter.</li>
                        <li>Supports JSON Graph View of JSON String which works as JSON debugger or corrector and can
                            format Array and Object.</li>
                        <li>Stores data locally for the last JSON Formatted in Browser's Local Storage. This can be used
                            as notepad++ / Sublime / VSCode alternative of JSON beautification.</li>
                        <li>This JSON online formatter can also work as <em>JSON Lint</em>.</li>
                        <li>Use Auto switch to turn auto update on or off for beautification.</li>
                        <li>It uses $.parseJSON and JSON.stringify to beautify JSON easy for a human to read and
                            analyze.</li>
                        <li>Download JSON, once it's created or modified and it can be opened in Notepad++, Sublime, or
                            VSCode alternative.</li>
                        <li>JSON Format Checker helps to fix the missing quotes, click the setting icon which looks like
                            a screwdriver on the left side of the editor to fix the format.
                    </ul>
                    <p>Know more about JSON :</p>
                    <ul>
                        <li><a class="text-dark" href="https://codebeautify.org/blog/how-to-create-json-file/"
                                rel="noopener" target="_blank">How to Create JSON File?</a></li>
                        <li><a class="text-dark" href="https://codebeautify.org/blog/json-full-form/" rel="noopener"
                                target="_blank">JSON Full Form</a></li>
                        <li><a class="text-dark" href="https://codeblogmoney.com/what-is-json/" rel="noopener"
                                target="_blank">What is JSON?</a></li>
                        <li><a class="text-dark"
                                href="https://codeblogmoney.com/json-example-with-data-types-including-json-array/"
                                rel="noopener" target="_blank">JSON Example with all data types including JSON
                                Array.</a></li>
                        <li><a class="text-dark" href="https://codeblogmoney.com/json-pretty-print-using-python/"
                                rel="noopener" target="_blank">Python Pretty Print JSON</a></li>
                        <li><a class="text-dark" href="https://codeblogmoney.com/read-json-file-using-python/"
                                rel="noopener" target="_blank">Read JSON File Using Python</a></li>
                        <li><a class="text-dark" href="https://codeblogmoney.com/validate-json-string-using-php/"
                                rel="noopener" target="_blank">Validate JSON using PHP</a></li>
                        <li><a class="text-dark" href="https://codebeautify.org/blog/python-load-json-from-file/"
                                rel="noopener" target="_blank">Python Load Json From File</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <p>Online JSON Formatter and Online JSON Validator provide <em>JSON converter</em> tools to convert
                        <a href="{{ asset('theme/jsonformatter.org/json-to-xml.html') }}">JSON to XML</a>, <a
                            href="{{ asset('theme/jsonformatter.org/json-to-csv.html') }}">JSON to CSV</a>, and <a
                            href="{{ asset('theme/jsonformatter.org/json-to-yaml.html') }}">JSON to YAML</a> also <a
                            href="{{ asset('theme/jsonformatter.org/json-editor.html') }}">JSON Editor</a>,
                        JSONLint, JSON Checker, and JSON Cleaner.
                    </p>
                    <p>Free JSON Formatting Online and JSON Validator work well in Windows, Mac, Linux, Chrome, Firefox,
                        Safari, and Edge.</p>
                    <p>
                    <h4>JSON Example:</h4>
                    Play with JSON data: <a
                        href="index5b7e.html?url=https://gist.githubusercontent.com/cbmgit/852c2702d4342e7811c95f8ffc2f017f/raw/InsuranceCompanies.json">Insurance
                        Company JSON</a>
                    <p>
                        <pre><code>{ "InsuranceCompanies": { "Top Insurance Companies":[ { "No": "1", "Name": "Berkshire Hathaway ( BRK.A)", "Market Capitalization": "$308 billion" } ], "source": "investopedia.com", "Time":"Feb 2019" } }</code></pre>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>JSON Validator</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p><em>JSON Validator Online</em> checks the integrity/syntax of the JSON data based on JavaScript
                        Object Notation (JSON) Data Interchange Format Specifications (RFC).</p>
                    <ul>
                        <li>It's super easy to find the error when line numbers are highlighted with an in-detail error
                            description.</li>
                        <li>Use Screwdriver icon to as <em>JSON Fixer</em> to repair the error.</li>
                        <li>To validate JSON you just need internet and no need to install any software.</li>
                        <li>Your JSON Data gets validated in the browser itself.</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <p>This JSON Lint tool provides fast and without sign up, user can checks the JSON data's validity.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="faq" id="faq">
        <div class>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="f3em">FAQ</p>
                    <hr class="star-light">
                </div>
            </div>
            <div class="rowfaq">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a aria-expanded="false" class="accordion-toggle collapsed"
                                data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Why JSON
                                FORMATTER?</a></h4>
                    </div>
                    <div style="height: 0px;" aria-expanded="false" id="collapseOne"
                        class="panel-collapse collapse">
                        <div class="panel-body faq-text">JSON Formatter is very unique tool for formatting JSON,
                            converting to XML, CSV and YAML. It can be used as json validator, json editor and json
                            viewer.</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a aria-expanded="false" class="accordion-toggle collapsed"
                                data-toggle="collapse" data-parent="#accordion" href="#collapseX">Why format JSON
                                Online?</a></h4>
                    </div>
                    <div style="height: 0px;" aria-expanded="false" id="collapseX" class="panel-collapse collapse">
                        <div class="panel-body faq-text">It's hassle free, no need to install any software, speedy and
                            secure, it saves time and accessible everywhere. Easy to clean and format JSON.</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a aria-expanded="false" class="accordion-toggle collapsed"
                                data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">How do I format a
                                JSON file?</a></h4>
                    </div>
                    <div style="height: 0px;" aria-expanded="false" id="collapseTwo"
                        class="panel-collapse collapse">
                        <div class="panel-body faq-text">Using JSON Formatter, click on upload button, it will open a
                            popup window to upload files. select the file and click on format.</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a aria-expanded="false" class="accordion-toggle collapsed"
                                data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">How to use JSON
                                formatter with URL?</a></h4>
                    </div>
                    <div style="height: 0px;" aria-expanded="false" id="collapseTwo"
                        class="panel-collapse collapse">
                        <div class="panel-body faq-text">
                            Json Formatter support URL linking for sharing json.<br> i.e.
                            <a
                                href="index0516.html?url=https://gist.githubusercontent.com/jimmibond/9205480889e19c0de347/raw/sample.json">
                                https://jsonformatter.org/?url=<wbr>https://gist.gi<wbr>thubusercontent<wbr>.com/jimmibond/<wbr>9205480889e19c0<wbr>de347/raw/sampl<wbr>e.json
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a aria-expanded="false" class="accordion-toggle collapsed"
                                data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Is login
                                required to save JSON data?</a></h4>
                    </div>
                    <div style="height: 0px;" aria-expanded="false" id="collapseThree"
                        class="panel-collapse collapse">
                        <div class="panel-body faq-text">No. It's not required to save and share code. If JSON data is
                            saved without login, it will become public. To make json data private please login and save
                            the links. </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a aria-expanded="false" class="accordion-toggle collapsed"
                                data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Have you
                                accidentally saved your JSON data?</a></h4>
                    </div>
                    <div style="height: 0px;" aria-expanded="false" id="collapseFour"
                        class="panel-collapse collapse">
                        <div class="panel-body faq-text">Please send us the details of the URL using <a
                                href="contact.html">Contact US</a>.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div align="center" data-freestar-ad="__336x280 __336x280" id="jsonformatter_incontent_3">
        <script data-cfasync="false" type="text/javascript">
            freestar.config.enabled_slots.push({
                placementName: "jsonformatter_incontent_3",
                slotId: "jsonformatter_incontent_3"
            });
        </script>
    </div>
    <div id="loadFileDialog" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Load External Data</h4>
                </div>
                <div class="modal-body text-center">
                    <div class="form-group">
                        <input type="text" class="form-control" id="path" placeholder="Enter Url" autofocus>
                        <br>
                        <button type="button" class="btn btn-primary btn-md" onclick="callDataUrl()">Load
                            URL</button>
                    </div>
                    <div class="col-lg-12 text-center">
                        <hr class="star-primary">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-md" id="me"
                            onclick="openFileUser();">Upload File</button>
                    </div>

                    <div id="dropZone" class="form-group" onclick="openFileUser();"
                        style="border: 2px dashed #ccc; padding: 20px; cursor: pointer;">
                        Drag & Drop your file here or click to upload
                    </div>

                    <div id="fileContent"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="loadFileClose" class="btn btn-default"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="saveDialog" class="modal" role="dialog">
        <input type="hidden" id="id" value="1"><input type="hidden" id="dataUrl" value />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Save Online</h4>
                </div>
                <div class="modal-body">
                    <form name="sentMessage" id="contactForm" novalidate action="{{ route('test') }}"
                        method="POST">
                        @csrf
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Title</label> <input type="text" class="form-control" placeholder="Title"
                                    id="title" required
                                    data-validation-required-message="Please enter your title">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Tags</label> <input type="text" class="form-control" placeholder="Tags"
                                    id="tags">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Description</label>
                                <textarea rows="5" class="form-control" placeholder="Description" id="desc"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div class="row control-group">
                            <div class="form-group col-xs-4"><span class="lead">Link Expiry Time</span></div>
                            <div class="form-group col-xs-8">
                                <select class="form-control" id="expiryTime">
                                    <option value="60">1 Hour</option>
                                    <option value="480">8 Hour</option>
                                    <option value="1440" selected="selected">24 Hours</option>
                                    <option value="10080">7 Days</option>
                                    <option value="21600">15 Days</option>
                                    <option value="43200">30 Days</option>
                                    <option value>Never</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer"><button type="button" id="btnSave" class="btn btn-default"
                        data-dismiss="modal"
                        onclick="download('{{ asset('theme/jsonformatter.org/dist/js/vendor/FileSaver.min.js') }}')">Download</button><button
                        type="button" id="btnUpdate" class="btn btn-default" data-dismiss="modal"
                        onclick="update();">Update</button><button type="button" id="btnSaveAndShare"
                        class="btn btn-default" data-dismiss="modal" onclick="save();">Save Online</button><button
                        type="button" id="loadSaveClose" class="btn btn-default"
                        data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-info btn-lg hide" data-toggle="modal" data-target="#saveDialog"
        id="openSave">ErrorDialog</button>
    <div id="errorDialog" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Message</h4>
                </div>
                <div class="modal-body">
                    <p id="errorMsg"></p>
                </div>
                <div class="modal-footer"> <button type="button" class="btn btn-default"
                        data-dismiss="modal">Close</button> </div>
            </div>
        </div>
    </div>

    <div id="dropMask"
        style="display: none !important; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); color: white; display: flex; align-items: center; justify-content: center; font-size: 24px; z-index: 9999;">
        Drag and Drop File XML Or TXTHere
    </div>

    <button type="button" id="openError" class="btn btn-info btn-lg hide" data-toggle="modal"
        data-target="#errorDialog">ErrorDialog</button>
    @include('layouts.footer')
    <script src="{{ asset('theme/ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>
    <script async src="{{ asset('theme/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('theme/jsonformatter.org/dist/3.8/js/jsontools-min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ asset('app/js/tool.js') }}"></script>
    <script src="{{ asset('app/js/download.js') }}"></script>
    <script src="{{ asset('app/js/convert_formatter.js') }}"></script>
    <script src="{{ asset('app/js/readfile_upload.js') }}"></script>
    <script src="{{ asset('app/js/drag_drop_file.js') }}"></script>
    <script src="{{ asset('app/js/call_data_url.js') }}"></script>
    <script src="{{ asset('app/js/copy_data.js') }}"></script>
    <script src="{{ asset('app/js/save_format.js') }}"></script>

</body>
<!-- Mirrored from jsonformatter.org/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 04:05:03 GMT -->

</html>
