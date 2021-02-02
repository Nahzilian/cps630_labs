<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Art Work Database</title>
    <link rel="stylesheet" href="./stylesheets/index.css">
  </head>
  <body>
    <h1>Art Work Database</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <label for="genre">Genre</label>
    <select class="genre" name="genre">
      <option value="1">Abstract</option>
      <option value="2">Baroque</option>
      <option value="3">Gothic</option>
      <option value="4">Renaissance</option>
    </select>
    <label for="type">Type</label>
    <select class="type" name="type">
      <optgroup label="Painting">
        <option value="3">Landscape</option>
        <option value="4">Portrait</option>
      </optgroup>
      <option value="2">Sculpture</option>
    </select>
    <label for="specification">Specification</label>
    <select class="specification" name="specification">
      <option value="1">Commercial</option>
      <option value="2">None-commercial</option>
      <option value="3">Derivitive Work</option>
      <option value="4">None-Derivitive Work</option>
    </select>
    <label for="year">Year</label>
    <input type="datetime" name="year" value="">
    <label for="name">Museum</label>
    <input type="text" name="name" value="">
  </body>
</html>
