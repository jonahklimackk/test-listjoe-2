@if($errors->any())
<div class="banner alert-danger">
	<b>Ooops, You have a few errors, scroll down to see.</b>
</div>
@elseif(session('message'))
<div class="banner alert-primary ">
	<b>{{ session('message') }}</b>
</div>
@endif



<style>
.banner {
    position: relative;
    z-index: 9999;
    padding: .75rem 1.25rem;
    margin-bottom: 2rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}

.banner.active {
    display: block;
}

.banner-bottom {
    left: 0;
    right: 0;
    bottom: 10px;
}

.banner-top {
    left: 0;
    right: 0;
    top: 10px;
}

.banner-right {
    right: 10px;
    bottom: 10%;
    min-height: 10vh;
}

.banner-left {
    left: 10px;
    bottom: 10%;
    min-height: 10vh;
}

.alert-primary {
    color: #004085;
    background-color: #cce5ff;
    border-color: #b8daff;
}

.alert-danger {
    color: #900000;
    background-color: #cce5ff;
    border-color: black
}

.banner-close {
    position: absolute;
    right: 1.5%;
}

.banner-close:after {
    position: absolute;
    right: 0;
    top: 50%;
    content: 'X';
    color: #69f;
}
</style>