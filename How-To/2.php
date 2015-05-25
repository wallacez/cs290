<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>How To Embed Graphics In A Webpage Using matplotlib</title>
    <!-- bootstrap css -->
    <link href="bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <!-- page header -->
    <section>
      <div class="page-header">
        <h1 align="center">Part 1: Installing matplotlib And Its Dependencies</h1>
        <h2 align="center">For Mac OS, Linux, and Windows</h2>
    </section>
    <!-- body section -->
    <section>
      <div class="container">
        <p class="text-info">
          Before you begin making fancy graphs or pretty plots, you need to have the matplotlib packaged installed.  The matplotlib library
          itself requires quite a few dependencies of its own, so I'll walk you through the steps here.
        </p>
        <blockquote>
          <h3>Mac OS and Linux</h3>
            <p>
              First things first: <code>matplotlib</code> is a Python library, so you'll need to have some version of Python installed on your computer.
              Navigate <a href="https://www.python.org/downloads/">here</a> to download the latest version of Python 2.7 or 3.4.  Whichever 
              version you decide to use is up to you; I will be using 2.7 in this tutorial.  For more information on which version is right
              for you, <a href="https://wiki.python.org/moin/Python2orPython3">this</a> is a good place to start.
            </p>
            <p>
              Once you have Python installed, visit the <a href="http://matplotlib.org/downloads.html">matplotlib downloads page</a> and install 
              the package.  However, matplotlib also requires the <code>numpy</code>, <code>pyparsing</code>, <code>pyqt</code>, 
              <code>python-dateutil</code>, <code>pytz</code>, <code>setuptools</code>, and <code>six </code>libraries, so it is probably easier
              to just install using <code>pip</code>, the Python standard installation program.  See the<a href="http://matplotlib.org/users/installing.html">
               installation page</a> for more details.
            </p>
        </blockquote>
        <blockquote>
          <h3>Windows</h3>
            <p>
              Installing <code>matplotlib</code> on Windows is a little trickier.  On Windows 7/8, it is easiest to just install one of the pre-made
              scipy-stack compatible distributions found <a href="http://www.scipy.org/install.html">here</a>.  While most are free of charge, the 
              downside is that these can be gigantic downloads filled with a lot of libraries that you don't need.  I found it easiest to use 
              <a href="http://conda.pydata.org/miniconda.html">Miniconda</a>, a lighter version of Anaconda that allows you to install only the libraries
              you want.  Once the core Miniconda package is downloaded, you can use <code>conda install matplotlib</code> to quickly and efficiently install
              <code>matplotlib</code> and its required dependencies.
            </p>
        </blockquote>
      </div>
    </section>
    <?php 
      echo '<p align="center">Click <a href="3.php">here</a> to go to the next page!'; 
      echo '<p align="center">Click <a href="1.php">here</a> to go to the previous page';      
    ?> 
  </body>
</html>
