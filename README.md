# Petsola CRUD App [PHP + Vue.js]

Simple pet listing web application where user can see, add, update and delete pets. Created on <strong>Vue 3</strong> and <strong>REST API</strong> coded in <strong>PHP 8+</strong> using <strong>OOP principles</strong>.

<h2>Description</h2>

<ul>
<li>Application has 3 (pet list & pet add & pet update) pages. <strong>Vue router</strong> is used to maintain <strong>SPA</strong> while navigating the website.</li>
<li>Add Pet Form inputs are dinamically changed according to the selected pet type.</li>
<li>Input field details are retrieved from the database <strong>instead of hardcoding</strong> them in the front-end. This keeps <strong>Vue code clean, simple and easily maintainable</strong>, avoiding potential trouble in case of having <strong>100+ different pet types.</strong></li>
<li>In order to add the pet on the page, inserted form data has to meet the requirements. In case of providing invalid data, <strong>errors are displayed on the same page without reloading</strong>.</li>
<li>After the form data is validated and pet is successfully saved in the database, the user is redirected to the homepage, <strong>using Vue router</strong>, where they're presented the updated list of pets</li>
<li>Every pet container has it's own checkbox in the upper left corner. By clicking <strong>"Delete"</strong> the user can trigger delete event, which removes selected pets from the database and reloads the page with <strong>updated list of pets</strong>.</li>
<li>Update page can be accessed by "Edit" button in the upper right corner of pet container.</li>
</ul>

<h2>Live Demo</h2>

<ul>
<li>The project is hosted at <a href="https://www.000webhost.com/">www.000webhost.com</a> hosting.</li>
<li>Application can be accessed using the following URL: <a href="https://petsola.000webhostapp.com/">https://petsola.000webhostapp.com/</a></li>
<ul>
