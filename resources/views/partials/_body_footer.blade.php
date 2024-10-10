    <?php
    // $app = \App\Models\AppSetting::first();
    $sitesetup = App\Models\Setting::where('type','site-setup')->where('key', 'site-setup')->first();
    $app = json_decode($sitesetup->value);
    ?>
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 ">
                    <span class="mr-1">
                {!!$app->site_copyright !!}
                    </span>
                </div>
            </div>
        </div>
    </footer>