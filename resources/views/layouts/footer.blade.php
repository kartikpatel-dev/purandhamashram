<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 footer-links">
                    <ul>
                        <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a>
                        <li><a href="{{ route('terms-and-condition') }}">Terms and Condition</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        &copy; Copyright <strong><span>{{ config('app.name', 'Laravel') }}</span></strong>. All
                        Rights Reserved
                    </div>
                    <div class="credits">
                        <span>Designed & Developed by</span> <a href="https://codersfarm.com/" target="_blank">Coders Farm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
