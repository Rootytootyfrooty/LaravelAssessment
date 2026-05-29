<div class="flex gap-3">
    <a class="btn" href="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}">Sort by Latest</a>
    <a class="btn" href="{{ request()->fullUrlWithQuery(['sort' => 'oldest']) }}">Sort by Oldest</a>
    <a class="btn" href="{{ request()->fullUrlWithQuery(['sort' => 'aToZ']) }}">Sort by A-Z</a>
    <a class="btn" href="{{ request()->fullUrlWithQuery(['sort' => 'zToA']) }}">Sort by Z-A</a>
    <a class="btn" href="{{ request()->fullUrlWithQuery(['sort' => 'byCompany']) }}">Sort by Company</a>
</div>