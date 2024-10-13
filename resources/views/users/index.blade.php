@extends('layouts.main')

@section('title')
    Best JSON Formatter and JSON Validator: Online JSON Formatter
@endsection

@section('content')
    <div class="container container-no-padding">
        <div class="row" id="headerDiv">
            <div class="col-sm-8" id="msgDiv" style="float: right;"></div>
        </div>
        <div align="center" data-freestar-ad="__336x280 __970x90" id="jsonformatter_leaderboard_atf"></div>
        <div class="row">
            <div id="inputdiv" class="col-lg-5">
                <div id="inputeditor" tabindex="-1" class="jsoneditor-manual"></div>
            </div>
            <div class="col-lg-2">
                <button type="button" class="btn btn-xs btn-outline btn-block" href="#loadFileDialog" data-toggle="modal"
                    onclick="clearInput('loadFileDialog')" title="JSON URL or Browse File">Upload Data</button>
                <button type="button" class="btn btn-xs btn-outline btn-block" data-toggle="modal"
                    onclick="openSaveFormatModal()" id="save-modal" style="margin-top:13px">Save Format</button>
                <br>
                <div class="form-group">
                    <select class="form-control" id="sel1">
                        <option value="2" selected="selected">2 Tab Space</option>
                        <option value="3">3 Tab Space</option>
                        <option value="4">4 Tab Space</option>
                    </select>
                </div>
                <button type="button" id="defaultaction" class="btn btn-xs btn-outline btn-block" onclick="beautifyJSON();"
                    title="JSON Formatter">Format / Beautify</button>
                <button type="button" class="btn btn-xs btn-outline btn-block" onclick="copyToClipboard_Button()">Copy to
                    clipboard</button>
                <div align="center" style="padding-top:5px" data-freestar-ad="__320x100 __300x250"
                    id="jsonformatter_medrec_middle">
                    <script data-cfasync="false" type="text/javascript">
                        freestar.config.enabled_slots.push({
                            placementName: "jsonformatter_medrec_middle",
                            slotId: "jsonformatter_medrec_middle"
                        });
                    </script>
                </div>
                <button type="button" class="btn btn-xs btn-outline btn-block" onclick="minifyJSON();"
                    title="JSON Minify or JSON Compact">Minify / Compact</button><br>
                <div class="dropdown">
                    <button class="btn btn-xs btn-outline btn-block dropdown-toggle" type="button"
                        data-toggle="dropdown">Convert JSON to<span class="caret"></span></button>
                    <ul class="btn btn-xs btn-outline btn-block dropdown-menu" style="background:#fff !important">
                        <li>
                            <a href="javascript:void(0)" onclick="jsonToxml_PHP('{{ route('convert.xml') }}')">JSON to
                                XML</a>
                        </li>
                        <li><a href="javascript:void(0)" onclick="jsonToCSV_PHP('{{ route('convert.csv') }}')">JSON to
                                CSV</a></li>
                        <li><a href="javascript:void(0)" onclick="jsonToYaml_PHP('{{ route('convert.yaml') }}')">JSON to
                                YAML</a></li>
                        <input type="hidden" value="json" id="typeConvert">
                    </ul>
                </div>
                <br>
                <form>
                    @csrf
                    <button type="button" class="btn btn-xs btn-outline btn-block hidden-xs"
                        onclick="download('{{ route('downloadFile') }}')" title="JSON Download">Download</button>
                </form>
                <br />
                <p class="text-center"><a style="color:black;font-size: 16px;"
                        href="https://codebeautify.org/blog/json-full-form/" rel="noopener" target="_blank">JSON Full
                        Form</a></p>
            </div>
            <div id="outputdiv" class="col-lg-5">
                <div id="outputeditor" tabindex="-1" class="jsoneditor-manual"></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Modal HTML -->
    <div id="saveFormatModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Save Format</h4>
                </div>
                <div class="modal-body">
                    <form id="saveFormatForm">
                        <div class="form-group">
                            <label for="name"> Name<span class="text-danger">*</span></label>
                            <input type="text" id="name" class="form-control">
                            <span id="name-error" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" id="title" class="form-control">
                            <span id="title-error" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="tag">Tag</label>
                            <input type="text" id="tag" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" rows="8"></textarea>
                        </div>
                        <span id="error-message" class="text-danger" style="display:none;"></span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="validateAndSaveFormat('{{ route('save.format') }}')">Save</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal-content {
            background-color: #f8f9fa;
            color: #333;
        }

        input.form-control,
        textarea.form-control {
            color: #333;
            background-color: #fff;
        }
    </style>
@endsection
