<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>The Code Man blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
  @stack('style')
</head>
<body >
  <div id="app">
  <v-app >
    <v-content>
      <v-toolbar class="pink darken-1 white--text" >
        
        <v-toolbar-title>
          <v-btn to="/" class="white--text" flat>TheCodeMan</v-btn>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items >
          <v-btn to="/tags/list" flat class="white--text">Tags</v-btn>
          <v-btn to="/blogs/list" class="white--text" flat>Blogs</v-btn>
        </v-toolbar-items>
      </v-toolbar>

      
      <v-container>
        
        <router-view></router-view>
      </v-container>
    
  
    </v-content>
    </v-app >
  </div>
  <script>
  var site_url = "{{url('/')}}"
  </script>
  <script src="{{asset('js/app.js')}}"></script>
  @stack('scripts')
</body>
</html>

