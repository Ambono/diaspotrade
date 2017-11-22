<head>
  <link data-require="bootstrap-css@3.1.1" data-semver="3.1.1" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
  <script data-require="angular.js@1.3.0" data-semver="1.3.0" src="https://code.angularjs.org/1.3.0/angular.js"></script>
  <script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
  <script data-require="bootstrap@3.1.1" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css" />
  <script src="script.js"></script>
  <script src="dirPagination.js"></script>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div ng-controller="MyController" class="my-controller">
          <h1>Tasty Paginated Menu</h1>

          <small>this is in "MyController"</small>


          <div class="row">
            <div class="col-xs-4">
              <h3>Meals Page: {{ currentPage }}</h3>
            </div>
            <div class="col-xs-4">
              <label for="search">Search:</label>
              <input ng-model="q" id="search" class="form-control" placeholder="Filter text">
            </div>
            <div class="col-xs-4">
              <label for="search">items per page:</label>
              <input type="number" min="1" max="100" class="form-control" ng-model="pageSize">
            </div>
          </div>
          <br>
          <div class="panel panel-default">
            <div class="panel-body">

              <ul>
              <li dir-paginate="meal in meals | filter:q | itemsPerPage: pageSize" current-page="currentPage"><strong>{{ meal }}</strong>
                 <ul>
                    <li>$index:  {{ $index }}</li>
                    <li>corrected index: {{ ($index + 1) + (currentPage - 1) * pageSize}}</li>
                    <li>is $first: {{ $first }}</li>
                    <li>is $middle: {{ $middle }}</li>
                    <li>is $last: {{ $last }}</li>
                 </ul>
              </ul>
            </div>
          </div>
        </div>

        <div ng-controller="OtherController" class="other-controller">
          <small>this is in "OtherController"</small>
          <div class="text-center">
          <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="dirPagination.tpl.html"></dir-pagination-controls>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
