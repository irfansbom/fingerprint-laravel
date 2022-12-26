@extends('layout.layout')



@section('content')
    <link rel="stylesheet" href="{{ url('assets/fingerprint/src/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fingerprint/src/css/custom.css') }}">
    <script src="{{ url('assets/fingerprint/src/js/websdk.client.bundle.min.js') }}"></script>
    <script src="{{ url('assets/fingerprint/src/js/fingerprint.sdk.min.js') }}"></script>
    <script src="{{ url('assets/fingerprint/src/js/es6-shim.js') }}"></script>
    <div>
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">HOME</h1>
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item active"><a href="javascript:void(0);">Home</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </div>
                <div class="ms-auto pageheader-btn">
                    {{-- <a href="javascript:void(0);" class="btn btn-primary btn-icon text-white me-2">
                        <span>
                            <i class="fe fe-plus"></i>
                        </span> Add Account
                    </a> --}}
                    <button onclick="printfinger()" class="btn btn-success btn-icon text-white">
                        <span>
                            <i class="fe fe-log-in"></i>
                        </span> Export
                    </button>
                    <button onclick="printDeviceInfo()" class="btn btn-success btn-icon text-white">
                        <span>
                            <i class="fe fe-log-in"></i>
                        </span> printDeviceInfo
                    </button>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 -->

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Judul</h3>
                        </div>
                        {{-- <div class="card-body ">
                            <script src="{{ url('assets/fingerprint/src/js/jquery-3.5.0.min.js') }}"></script>
                            <script src="{{ url('assets/fingerprint/src/js/bootstrap.bundle.js') }}"></script>
                            <script src="{{ url('assets/fingerprint/src/js/es6-shim.js') }}"></script>
                            <script src="{{ url('assets/fingerprint/src/js/websdk.client.bundle.min.js') }}"></script>
                            <script src="{{ url('assets/fingerprint/src/js/fingerprint.sdk.min.js') }}"></script>
                            <script src="{{ url('assets/fingerprint/src/js/custom.js') }}"></script>

                            <div class="container">
                                <div id="controls" class="row justify-content-center mx-5 mx-sm-0 mx-lg-5">
                                    <div class="col-sm mb-2 ml-sm-5">
                                        <button id="createEnrollmentButton" type="button" class="btn btn-primary btn-block"
                                            data-toggle="modal" data-target="#createEnrollment"
                                            onclick="beginEnrollment()">Create Enrollment</button>
                                    </div>
                                    <div class="col-sm mb-2 mr-sm-5">
                                        <button id="verifyIdentityButton" type="button" class="btn btn-primary btn-block"
                                            data-toggle="modal" data-target="#verifyIdentity"
                                            onclick="beginIdentification()">Verify Identity</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <section>
        <!--Create Enrolment Section-->
        <div class="modal fade" id="createEnrollment" data-backdrop="static" tabindex="-1"
            aria-labelledby="createEnrollmentTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title my-text my-pri-color" id="createEnrollmentTitle">Create Enrollment</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onclick="clearCapture()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" onsubmit="return false">
                            <div id="enrollmentStatusField" class="text-center">
                                <!--Enrollment Status will be displayed Here-->
                            </div>
                            <div class="form-row mt-3">
                                <div class="col mb-3 mb-md-0 text-center">
                                    <label for="enrollReaderSelect" class="my-text7 my-pri-color">Choose Fingerprint
                                        Reader</label>
                                    <select name="readerSelect" id="enrollReaderSelect" class="form-control"
                                        onclick="beginEnrollment()">
                                        <option selected>Select Fingerprint Reader</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col mb-3 mb-md-0 text-center">
                                    <label for="userID" class="my-text7 my-pri-color">Specify UserID</label>
                                    <input id="userID" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row mt-1">
                                <div class="col text-center">
                                    <p class="my-text7 my-pri-color mt-3">Capture Index Finger</p>
                                </div>
                            </div>
                            <div id="indexFingers" class="form-row justify-content-center">
                                <div id="indexfinger1" class="col mb-3 mb-md-0 text-center">
                                    <span class="icon icon-indexfinger-not-enrolled" title="not_enrolled"></span>
                                </div>
                                <div id="indexfinger2" class="col mb-3 mb-md-0 text-center">
                                    <span class="icon icon-indexfinger-not-enrolled" title="not_enrolled"></span>
                                </div>
                                <div id="indexfinger3" class="col mb-3 mb-md-0 text-center">
                                    <span class="icon icon-indexfinger-not-enrolled" title="not_enrolled"></span>
                                </div>
                                <div id="indexfinger4" class="col mb-3 mb-md-0 text-center">
                                    <span class="icon icon-indexfinger-not-enrolled" title="not_enrolled"></span>
                                </div>
                            </div>
                            <div class="form-row mt-1">
                                <div class="col text-center">
                                    <p class="my-text7 my-pri-color mt-5">Capture Middle Finger</p>
                                </div>
                            </div>
                            <div id="middleFingers" class="form-row justify-content-center">
                                <div id="middleFinger1" class="col mb-3 mb-md-0 text-center">
                                    <span class="icon icon-middlefinger-not-enrolled" title="not_enrolled"></span>
                                </div>
                                <div id="middleFinger2" class="col mb-3 mb-md-0 text-center">
                                    <span class="icon icon-middlefinger-not-enrolled" title="not_enrolled"></span>
                                </div>
                                <div id="middleFinger3" class="col mb-3 mb-md-0 text-center">
                                    <span class="icon icon-middlefinger-not-enrolled" title="not_enrolled"></span>
                                </div>
                                <div id="middleFinger4" class="col mb-3 mb-md-0 text-center" value="true">
                                    <span class="icon icon-middlefinger-not-enrolled" title="not_enrolled"></span>
                                </div>
                            </div>
                            <div class="form-row m-3 mt-md-5 justify-content-center">
                                <div class="col-4">
                                    <button class="btn btn-primary btn-block my-sec-bg my-text-button py-1" type="submit"
                                        onclick="beginCapture()">Start Capture</button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-primary btn-block my-sec-bg my-text-button py-1" type="submit"
                                        onclick="serverEnroll()">Enroll</button>
                                </div>
                                <div class="col-4">
                                    <button
                                        class="btn btn-secondary btn-outline-warning btn-block my-text-button py-1 border-0"
                                        type="button" onclick="clearCapture()">Clear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="form-row">
                            <div class="col">
                                <button class="btn btn-secondary my-text8 btn-outline-danger border-0" type="button"
                                    data-dismiss="modal" onclick="clearCapture()">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <!--Verify Identity Section-->
        <div id="verifyIdentity" class="modal fade" data-backdrop="static" tabindex="-1"
            aria-labelledby="verifyIdentityTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title my-text my-pri-color" id="verifyIdentityTitle">Identity Verification</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onclick="clearCapture()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" onsubmit="return false">
                            <div id="verifyIdentityStatusField" class="text-center">
                                <!--verifyIdentity Status will be displayed Here-->
                            </div>
                            <div class="form-row mt-3">
                                <div class="col mb-3 mb-md-0 text-center">
                                    <label for="verifyReaderSelect" class="my-text7 my-pri-color">Choose Fingerprint
                                        Reader</label>
                                    <select name="readerSelect" id="verifyReaderSelect" class="form-control"
                                        onclick="beginIdentification()">
                                        <option selected>Select Fingerprint Reader</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col mb-md-0 text-center">
                                    <label for="userIDVerify" class="my-text7 my-pri-color m-0">Specify UserID</label>
                                    <input type="text" id="userIDVerify" class="form-control mt-1" required>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <div class="col text-center">
                                    <p class="my-text7 my-pri-color mt-1">Capture Verification Finger</p>
                                </div>
                            </div>
                            <div id="verificationFingers" class="form-row justify-content-center">
                                <div id="verificationFinger" class="col mb-md-0 text-center">
                                    <span class="icon icon-indexfinger-not-enrolled" title="not_enrolled"></span>
                                </div>
                            </div>
                            <div class="form-row mt-3" id="userDetails">
                                <!--this is where user details will be displayed-->
                            </div>
                            <div class="form-row m-3 mt-md-5 justify-content-center">
                                <div class="col-4">
                                    <button class="btn btn-primary btn-block my-sec-bg my-text-button py-1" type="submit"
                                        onclick="captureForIdentify()">Start Capture</button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-primary btn-block my-sec-bg my-text-button py-1" type="submit"
                                        onclick="serverIdentify()">Identify</button>
                                </div>
                                <div class="col-4">
                                    <button
                                        class="btn btn-secondary btn-outline-warning btn-block my-text-button py-1 border-0"
                                        type="button" onclick="clearCapture()">Clear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="form-row">
                            <div class="col">
                                <button class="btn btn-secondary my-text8 btn-outline-danger border-0" type="button"
                                    data-dismiss="modal" onclick="clearCapture()">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection

@section('style')
@endsection


@section('script')
    <script>
        $('#menu_home').addClass('active')
        // var sdk;

        let currentFormat = Fingerprint.SampleFormat.Intermediate;
        let FingerprintSdkTest = (function() {
            function FingerprintSdkTest() {
                let _instance = this;
                this.operationToRestart = null;
                this.acquisitionStarted = false;
                // instantiating the fingerprint sdk here
                this.sdk = new Fingerprint.WebApi;
                this.sdk.onDeviceConnected = function(e) {
                    // Detects if the device is connected for which acquisition started
                    showMessage("Scan Appropriate Finger on the Reader", "success");
                };
                this.sdk.onDeviceDisconnected = function(e) {
                    // Detects if device gets disconnected - provides deviceUid of disconnected device
                    showMessage("Device is Disconnected. Please Connect Back");
                };
                this.sdk.onCommunicationFailed = function(e) {
                    // Detects if there is a failure in communicating with U.R.U web SDK
                    showMessage("Communication Failed. Please Reconnect Device")
                };
                this.sdk.onSamplesAcquired = function(s) {
                    // Sample acquired event triggers this function
                    // storeSample(s);
                    console.log(s)
                };
                this.sdk.onQualityReported = function(e) {
                    // Quality of sample acquired - Function triggered on every sample acquired
                    //document.getElementById("qualityInputBox").value = Fingerprint.QualityCode[(e.quality)];
                }
            }

            // this is were finger print capture takes place
            FingerprintSdkTest.prototype.startCapture = function() {
                if (this.acquisitionStarted) // Monitoring if already started capturing
                    return;
                let _instance = this;
                // showMessage("");
                this.operationToRestart = this.startCapture;
                this.sdk.startAcquisition(currentFormat, "").then(function() {
                    _instance.acquisitionStarted = true;
                    console.log('a')
                    //Disabling start once started
                    //disableEnableStartStop();

                }, function(error) {
                    showMessage(error.message);
                });
            };

            FingerprintSdkTest.prototype.stopCapture = function() {
                if (!this.acquisitionStarted) //Monitor if already stopped capturing
                    return;
                let _instance = this;
                // showMessage("");
                this.sdk.stopAcquisition().then(function() {
                    _instance.acquisitionStarted = false;
                    console.log('a')
                    //Disabling stop once stopped
                    //disableEnableStartStop();

                }, function(error) {
                    // showMessage(error.message);
                });
            };

            FingerprintSdkTest.prototype.getInfo = function() {
                let _instance = this;
                return this.sdk.enumerateDevices();
            };

            FingerprintSdkTest.prototype.getDeviceInfoWithID = function(uid) {
                let _instance = this;
                return this.sdk.getDeviceInfo(uid);
            };

            return FingerprintSdkTest;
        })();



        function printDeviceInfo(uid) {
            var myDeviceVal = test.getDeviceInfoWithID(uid);
            myDeviceVal.then(function(sucessObj) {
                console.log(sucessObj.DeviceID);
                console.log(Fingerprint.DeviceTechnology[sucessObj.eDeviceTech]);
                console.log(Fingerprint.DeviceModality[sucessObj.eDeviceModality]);
                console.log(Fingerprint.DeviceUidType[sucessObj.eUidType]);
            }, function(error) {
                console.log(error.message);
            });
        }


        function showMessage(message, message_type = "error") {
            let types = new Map();
            types.set("success", "my-text7 my-pri-color text-bold");
            types.set("error", "text-danger");
            let statusFieldID = myReader.currentStatusField;
            if (statusFieldID) {
                let statusField = document.getElementById(statusFieldID);
                statusField.innerHTML =
                    `<p class="my-text7 my-pri-color my-3 ${types.get(message_type)} font-weight-bold">${message}</p>`;
            }
        }

        window.onload = function() {
            test = new FingerprintSdkTest();
            test.startCapture();

        }

        function printfinger() {
            console.log(test)
        }
    </script>
@endsection
