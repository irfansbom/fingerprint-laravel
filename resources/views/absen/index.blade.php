@extends('layout.layout')



@section('content')
    {{-- <link rel="stylesheet" href="{{ url('assets/fingerprint/src/css/bootstrap.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ url('assets/fingerprint/src/css/custom.css') }}"> --}}
    <div>
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">Absen</h1>
                    <ol class="breadcrumb px-2">
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Absen</a></li>
                    </ol>
                </div>
                <div class="ms-auto pageheader-btn">
                    <a class="btn btn-primary btn-icon text-white me-2" href="{{ url('absen/create') }}">
                        <span>
                            <i class="fe fe-plus"></i>
                        </span> Rekam Baru
                    </a>
                    {{-- <button onclick="printfinger()" class="btn btn-success btn-icon text-white">
                        <span>
                            <i class="fe fe-log-in"></i>
                        </span> Export
                    </button>
                    <button onclick="printDeviceInfo()" class="btn btn-success btn-icon text-white">
                        <span>
                            <i class="fe fe-log-in"></i>
                        </span> printDeviceInfo
                    </button> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h3 class="card-title ">Fingerprint</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-10" id="statusfield">
                                            <span class="badge bg-dark text-white">
                                                Fingerprint Reader Not Connect
                                            </span>
                                        </div>

                                        <div class="col-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="toggle_reader">
                                                <label class="form-check-label" for="toggle_reader">On/off</label>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="">
                                        <div class="form-group">
                                            <label for="device_id" class="label"> Fingerprint Reader </label>
                                            <select name="device_id" id="device_id" class="select2">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="user" class="label">User</label>
                                            <input type="text" id="user" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="fingerprint" class="label">ID Fingerprint</label>
                                            <input type="text" class="form-control" id="fingerprint" readonly>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-4" id="divimage">
                                    <img width="300px" height="300px" id="fingerimage">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="modal_add_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_add_label">Rekam Pengguna Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('script')
    <script src="{{ url('assets/fingerprint/src/js/websdk.client.bundle.min.js') }}"></script>
    <script src="{{ url('assets/fingerprint/src/js/fingerprint.sdk.min.js') }}"></script>
    <script src="{{ url('assets/fingerprint/src/js/es6-shim.js') }}"></script>
    <script>
        $('#menu_absen').addClass('active')
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
                    showMessage("Ready to use", "info");
                };
                this.sdk.onDeviceDisconnected = function(e) {
                    // Detects if device gets disconnected - provides deviceUid of disconnected device
                    showMessage("Device Disconnect", "error");
                };
                this.sdk.onCommunicationFailed = function(e) {
                    // Detects if there is a failure in communicating with U.R.U web SDK
                    showMessage("Communication Failed. Please Reconnect Device", "error")
                };
                this.sdk.onSamplesAcquired = function(s) {
                    // console.log(s)
                    storeSample(s)
                };
                this.sdk.onQualityReported = function(e) {
                    // console.log(e)
                }
            }

            FingerprintSdkTest.prototype.startCapture = function() {
                if (this.acquisitionStarted) // Monitoring if already started capturing
                    return;
                let _instance = this;
                this.operationToRestart = this.startCapture;
                // showMessage("start", "success");
                this.sdk.startAcquisition(currentFormat).then(function() {
                    _instance.acquisitionStarted = true;
                }, function(error) {
                    showMessage(error.message);
                });
            };

            FingerprintSdkTest.prototype.stopCapture = function() {
                if (!this.acquisitionStarted) //Monitor if already stopped capturing
                    return;
                let _instance = this;
                showMessage("stop", "error");
                this.sdk.stopAcquisition().then(function() {
                    _instance.acquisitionStarted = false;

                }, function(error) {
                    showMessage(error.message);
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

        var sdk = new FingerprintSdkTest()

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

        function showMessage(message, status) {
            if (status == "success") {
                $('#statusfield').html('');
                $('#statusfield').html('<span class="badge bg-success">' + message + '</span>');
            } else if (status == "error") {
                $('#statusfield').html('');
                $('#statusfield').html('<span class="badge bg-danger">' + message + '</span>');
            } else if (status == "info") {
                $('#statusfield').html('');
                $('#statusfield').html('<span class="badge bg-info">' + message + '</span>');
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function storeSample(sample) {
            let samples = JSON.parse(sample.samples);
            let sampleData = samples[0].Data
            // let sampleData = samples
            console.log(sampleData)
            var image = new Image();
            image.src = sampleData;

            $('#fingerprint').val(sampleData)
            $.ajax({
                url: "{{ url('savefingerimage') }}",
                type: 'POST',
                data: jQuery.param({
                    sampledata: sampleData
                }),
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                success: function(response) {
                    // console.log(response)
                },
                error: function() {
                    alert("error");
                }
            });
        }

        function btn_startcapture() {
            // test = new FingerprintSdkTest();
            sdk.startCapture();
        }

        function btn_stopcapture() {
            // test = new FingerprintSdkTest();
            sdk.stopCapture();
        }

        $("#toggle_reader").change(function() {
            if ($('#toggle_reader').is(':checked')) {
                btn_startcapture()
            } else {
                btn_stopcapture();
            }
        });

        $(document).ready(function() {
            // var sdk = new FingerprintSdkTest();
            // window.sdk = new FingerprintSdkTest();
            // console.log(window.sdk)
            // sdk = this.sdk
        });
    </script>
@endsection
