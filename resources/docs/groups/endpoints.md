# Endpoints


## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/sanctum/csrf-cookie"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


<div id="execution-results-GETsanctum-csrf-cookie" hidden>
    <blockquote>Received response<span id="execution-response-status-GETsanctum-csrf-cookie"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETsanctum-csrf-cookie"></code></pre>
</div>
<div id="execution-error-GETsanctum-csrf-cookie" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsanctum-csrf-cookie"></code></pre>
</div>
<form id="form-GETsanctum-csrf-cookie" data-method="GET" data-path="sanctum/csrf-cookie" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETsanctum-csrf-cookie', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETsanctum-csrf-cookie" onclick="tryItOut('GETsanctum-csrf-cookie');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETsanctum-csrf-cookie" onclick="cancelTryOut('GETsanctum-csrf-cookie');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETsanctum-csrf-cookie" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>sanctum/csrf-cookie</code></b>
</p>
</form>


## api/v1/external/distance-between




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/v1/external/distance-between" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"origin":"temporibus","destination":"eligendi"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/external/distance-between"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "origin": "temporibus",
    "destination": "eligendi"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-external-distance-between" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-external-distance-between"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-external-distance-between"></code></pre>
</div>
<div id="execution-error-GETapi-v1-external-distance-between" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-external-distance-between"></code></pre>
</div>
<form id="form-GETapi-v1-external-distance-between" data-method="GET" data-path="api/v1/external/distance-between" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-external-distance-between', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-external-distance-between" onclick="tryItOut('GETapi-v1-external-distance-between');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-external-distance-between" onclick="cancelTryOut('GETapi-v1-external-distance-between');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-external-distance-between" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/external/distance-between</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>origin</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="origin" data-endpoint="GETapi-v1-external-distance-between" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>destination</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="destination" data-endpoint="GETapi-v1-external-distance-between" data-component="body" required  hidden>
<br>
</p>

</form>


## api/v1/business




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/v1/business" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/business"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-business" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-business"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-business"></code></pre>
</div>
<div id="execution-error-GETapi-v1-business" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-business"></code></pre>
</div>
<form id="form-GETapi-v1-business" data-method="GET" data-path="api/v1/business" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-business', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-business" onclick="tryItOut('GETapi-v1-business');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-business" onclick="cancelTryOut('GETapi-v1-business');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-business" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/business</code></b>
</p>
</form>


## api/v1/quote/draft




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/v1/quote/draft" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"rerum","last_name":"quia","phone":"modi","email":"guadalupe35@example.net","origin":"eum","destination":"eos","vehicle_year":14,"vehicle_make":"qui","vehicle_model":"veritatis","pickup_date":"2020-11-18","total":40249569.84061271,"quote_vehicles":[{"size":"15"}]}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/quote/draft"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "rerum",
    "last_name": "quia",
    "phone": "modi",
    "email": "guadalupe35@example.net",
    "origin": "eum",
    "destination": "eos",
    "vehicle_year": 14,
    "vehicle_make": "qui",
    "vehicle_model": "veritatis",
    "pickup_date": "2020-11-18",
    "total": 40249569.84061271,
    "quote_vehicles": [
        {
            "size": "15"
        }
    ]
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-v1-quote-draft" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-quote-draft"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-quote-draft"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-quote-draft" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-quote-draft"></code></pre>
</div>
<form id="form-POSTapi-v1-quote-draft" data-method="POST" data-path="api/v1/quote/draft" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-quote-draft', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-quote-draft" onclick="tryItOut('POSTapi-v1-quote-draft');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-quote-draft" onclick="cancelTryOut('POSTapi-v1-quote-draft');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-quote-draft" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/quote/draft</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>origin</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="origin" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>destination</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="destination" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>vehicle_year</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="vehicle_year" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>vehicle_make</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="vehicle_make" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>vehicle_model</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="vehicle_model" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>pickup_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="pickup_date" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
The value must be a valid date. The value must be a valid date in the format Y-m-d.</p>
<p>
<b><code>total</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="total" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
</p>
<p>
<details>
<summary>
<b><code>quote_vehicles</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>
</summary>
<br>
<p>
<b><code>quote_vehicles[].size</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_vehicles.0.size" data-endpoint="POSTapi-v1-quote-draft" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>8</code>, <code>7</code>, <code>9</code>, <code>10</code>, <code>11</code>, <code>12</code>, <code>13</code>, <code>14</code>, <code>15</code>, <code>16</code>, <code>17</code>, <code>18</code>, <code>19</code>, <code>20</code>, <code>21</code>, <code>22</code>, <code>23</code>, <code>24</code>, <code>25</code>, <code>26</code>, <code>27</code>, <code>28</code>, <code>29</code>, <code>30</code>, <code>31</code>, or <code>32</code>.</p>
</details>
</p>

</form>


## api/v1/carrier-types-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/v1/carrier-types-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/carrier-types-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-carrier-types-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-carrier-types-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-carrier-types-data"></code></pre>
</div>
<div id="execution-error-GETapi-v1-carrier-types-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-carrier-types-data"></code></pre>
</div>
<form id="form-GETapi-v1-carrier-types-data" data-method="GET" data-path="api/v1/carrier-types-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-carrier-types-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-carrier-types-data" onclick="tryItOut('GETapi-v1-carrier-types-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-carrier-types-data" onclick="cancelTryOut('GETapi-v1-carrier-types-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-carrier-types-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/carrier-types-data</code></b>
</p>
</form>


## api/v1/delivery-accuracy-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/v1/delivery-accuracy-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/delivery-accuracy-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-delivery-accuracy-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-delivery-accuracy-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-delivery-accuracy-data"></code></pre>
</div>
<div id="execution-error-GETapi-v1-delivery-accuracy-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-delivery-accuracy-data"></code></pre>
</div>
<form id="form-GETapi-v1-delivery-accuracy-data" data-method="GET" data-path="api/v1/delivery-accuracy-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-delivery-accuracy-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-delivery-accuracy-data" onclick="tryItOut('GETapi-v1-delivery-accuracy-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-delivery-accuracy-data" onclick="cancelTryOut('GETapi-v1-delivery-accuracy-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-delivery-accuracy-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/delivery-accuracy-data</code></b>
</p>
</form>


## api/v1/states-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/v1/states-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/states-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-states-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-states-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-states-data"></code></pre>
</div>
<div id="execution-error-GETapi-v1-states-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-states-data"></code></pre>
</div>
<form id="form-GETapi-v1-states-data" data-method="GET" data-path="api/v1/states-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-states-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-states-data" onclick="tryItOut('GETapi-v1-states-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-states-data" onclick="cancelTryOut('GETapi-v1-states-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-states-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/states-data</code></b>
</p>
</form>


## api/v1/car-sizes-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/v1/car-sizes-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/car-sizes-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-car-sizes-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-car-sizes-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-car-sizes-data"></code></pre>
</div>
<div id="execution-error-GETapi-v1-car-sizes-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-car-sizes-data"></code></pre>
</div>
<form id="form-GETapi-v1-car-sizes-data" data-method="GET" data-path="api/v1/car-sizes-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-car-sizes-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-car-sizes-data" onclick="tryItOut('GETapi-v1-car-sizes-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-car-sizes-data" onclick="cancelTryOut('GETapi-v1-car-sizes-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-car-sizes-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/car-sizes-data</code></b>
</p>
</form>


## api/v1/quote-statuses-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/v1/quote-statuses-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/quote-statuses-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-quote-statuses-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-quote-statuses-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-quote-statuses-data"></code></pre>
</div>
<div id="execution-error-GETapi-v1-quote-statuses-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-quote-statuses-data"></code></pre>
</div>
<form id="form-GETapi-v1-quote-statuses-data" data-method="GET" data-path="api/v1/quote-statuses-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-quote-statuses-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-quote-statuses-data" onclick="tryItOut('GETapi-v1-quote-statuses-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-quote-statuses-data" onclick="cancelTryOut('GETapi-v1-quote-statuses-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-quote-statuses-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/quote-statuses-data</code></b>
</p>
</form>


## api/v1/zip/{zip}/autocomplete




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/v1/zip/aut/autocomplete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"zip":"et"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/zip/aut/autocomplete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "zip": "et"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-zip--zip--autocomplete" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-zip--zip--autocomplete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-zip--zip--autocomplete"></code></pre>
</div>
<div id="execution-error-GETapi-v1-zip--zip--autocomplete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-zip--zip--autocomplete"></code></pre>
</div>
<form id="form-GETapi-v1-zip--zip--autocomplete" data-method="GET" data-path="api/v1/zip/{zip}/autocomplete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-zip--zip--autocomplete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-zip--zip--autocomplete" onclick="tryItOut('GETapi-v1-zip--zip--autocomplete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-zip--zip--autocomplete" onclick="cancelTryOut('GETapi-v1-zip--zip--autocomplete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-zip--zip--autocomplete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/zip/{zip}/autocomplete</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="zip" data-endpoint="GETapi-v1-zip--zip--autocomplete" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="zip" data-endpoint="GETapi-v1-zip--zip--autocomplete" data-component="body" required  hidden>
<br>
</p>

</form>


## api/v1/city/{city}/autocomplete




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/v1/city/aut/autocomplete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"city":"voluptates"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/city/aut/autocomplete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "city": "voluptates"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-city--city--autocomplete" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-city--city--autocomplete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-city--city--autocomplete"></code></pre>
</div>
<div id="execution-error-GETapi-v1-city--city--autocomplete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-city--city--autocomplete"></code></pre>
</div>
<form id="form-GETapi-v1-city--city--autocomplete" data-method="GET" data-path="api/v1/city/{city}/autocomplete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-city--city--autocomplete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-city--city--autocomplete" onclick="tryItOut('GETapi-v1-city--city--autocomplete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-city--city--autocomplete" onclick="cancelTryOut('GETapi-v1-city--city--autocomplete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-city--city--autocomplete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/city/{city}/autocomplete</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="city" data-endpoint="GETapi-v1-city--city--autocomplete" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="city" data-endpoint="GETapi-v1-city--city--autocomplete" data-component="body" required  hidden>
<br>
</p>

</form>


## api/v1/calculate-price




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/v1/calculate-price" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"origin_zip":"dolores","destination_zip":"aut","shipper_id":"reprehenderit"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/calculate-price"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "origin_zip": "dolores",
    "destination_zip": "aut",
    "shipper_id": "reprehenderit"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-v1-calculate-price" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-calculate-price"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-calculate-price"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-calculate-price" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-calculate-price"></code></pre>
</div>
<form id="form-POSTapi-v1-calculate-price" data-method="POST" data-path="api/v1/calculate-price" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-calculate-price', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-calculate-price" onclick="tryItOut('POSTapi-v1-calculate-price');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-calculate-price" onclick="cancelTryOut('POSTapi-v1-calculate-price');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-calculate-price" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/calculate-price</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>origin_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="origin_zip" data-endpoint="POSTapi-v1-calculate-price" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>destination_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="destination_zip" data-endpoint="POSTapi-v1-calculate-price" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-v1-calculate-price" data-component="body" required  hidden>
<br>
</p>

</form>


## api/v1/settings/logo




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/v1/settings/logo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/settings/logo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-v1-settings-logo" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-settings-logo"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-settings-logo"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-settings-logo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-settings-logo"></code></pre>
</div>
<form id="form-POSTapi-v1-settings-logo" data-method="POST" data-path="api/v1/settings/logo" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-settings-logo', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-settings-logo" onclick="tryItOut('POSTapi-v1-settings-logo');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-settings-logo" onclick="cancelTryOut('POSTapi-v1-settings-logo');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-settings-logo" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/settings/logo</code></b>
</p>
</form>


## api/v1/shipper/{shipper}/quotes/{quote}




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/v1/shipper/molestias/quotes/quia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"quia","quote_id":"quis"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/shipper/molestias/quotes/quia"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "quia",
    "quote_id": "quis"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-shipper--shipper--quotes--quote-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-shipper--shipper--quotes--quote-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-shipper--shipper--quotes--quote-"></code></pre>
</div>
<div id="execution-error-GETapi-v1-shipper--shipper--quotes--quote-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-shipper--shipper--quotes--quote-"></code></pre>
</div>
<form id="form-GETapi-v1-shipper--shipper--quotes--quote-" data-method="GET" data-path="api/v1/shipper/{shipper}/quotes/{quote}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-shipper--shipper--quotes--quote-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-shipper--shipper--quotes--quote-" onclick="tryItOut('GETapi-v1-shipper--shipper--quotes--quote-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-shipper--shipper--quotes--quote-" onclick="cancelTryOut('GETapi-v1-shipper--shipper--quotes--quote-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-shipper--shipper--quotes--quote-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/shipper/{shipper}/quotes/{quote}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-v1-shipper--shipper--quotes--quote-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>quote</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote" data-endpoint="GETapi-v1-shipper--shipper--quotes--quote-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="GETapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_id" data-endpoint="GETapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>

</form>


## api/v1/shipper/{shipper}/quotes/{quote}




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/v1/shipper/non/quotes/nesciunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"ipsa","quote_id":"qui","first_name":"commodi","last_name":"nostrum","phone":"dicta","email":"rbrown@example.org","type":"0","company":"culpa","address_1":"est","address_2":"optio","zip":"sit","city":"voluptatum","state":"NC","phone_2":"error","mobile":"nostrum","fax":"voluptatum","notes_from_shipper":"accusamus","quote_origin_zip":"est","quote_origin_city":"dignissimos","quote_origin_state":"SD","quote_destination_zip":"necessitatibus","quote_destination_city":"repudiandae","quote_destination_state":"TX","quote_vehicles":[{"year":10,"make":"pariatur","model":"excepturi","vin":"fuga","is_running":false,"size":"16","price":183636.2}],"carrier_type":"2","available_date":"2020\/11\/18","delivery_date":"2020\/11\/18","delivery_accuracy":"4","distance":27150.372,"price":10.99237578,"deposit":2.1999184,"status":5}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/shipper/non/quotes/nesciunt"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "ipsa",
    "quote_id": "qui",
    "first_name": "commodi",
    "last_name": "nostrum",
    "phone": "dicta",
    "email": "rbrown@example.org",
    "type": "0",
    "company": "culpa",
    "address_1": "est",
    "address_2": "optio",
    "zip": "sit",
    "city": "voluptatum",
    "state": "NC",
    "phone_2": "error",
    "mobile": "nostrum",
    "fax": "voluptatum",
    "notes_from_shipper": "accusamus",
    "quote_origin_zip": "est",
    "quote_origin_city": "dignissimos",
    "quote_origin_state": "SD",
    "quote_destination_zip": "necessitatibus",
    "quote_destination_city": "repudiandae",
    "quote_destination_state": "TX",
    "quote_vehicles": [
        {
            "year": 10,
            "make": "pariatur",
            "model": "excepturi",
            "vin": "fuga",
            "is_running": false,
            "size": "16",
            "price": 183636.2
        }
    ],
    "carrier_type": "2",
    "available_date": "2020\/11\/18",
    "delivery_date": "2020\/11\/18",
    "delivery_accuracy": "4",
    "distance": 27150.372,
    "price": 10.99237578,
    "deposit": 2.1999184,
    "status": 5
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-v1-shipper--shipper--quotes--quote-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-shipper--shipper--quotes--quote-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-shipper--shipper--quotes--quote-"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-shipper--shipper--quotes--quote-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-shipper--shipper--quotes--quote-"></code></pre>
</div>
<form id="form-POSTapi-v1-shipper--shipper--quotes--quote-" data-method="POST" data-path="api/v1/shipper/{shipper}/quotes/{quote}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-shipper--shipper--quotes--quote-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-v1-shipper--shipper--quotes--quote-" onclick="tryItOut('POSTapi-v1-shipper--shipper--quotes--quote-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-v1-shipper--shipper--quotes--quote-" onclick="cancelTryOut('POSTapi-v1-shipper--shipper--quotes--quote-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-v1-shipper--shipper--quotes--quote-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/shipper/{shipper}/quotes/{quote}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>quote</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_id" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>address_1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_1" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>address_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_2" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="zip" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="city" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>state</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="state" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>phone_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone_2" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>mobile</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mobile" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>fax</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="fax" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>notes_from_shipper</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="notes_from_shipper" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>quote_origin_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_origin_zip" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_origin_city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_origin_city" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_origin_state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_origin_state" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>quote_destination_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_destination_zip" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_destination_city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_destination_city" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_destination_state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_destination_state" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<details>
<summary>
<b><code>quote_vehicles</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>
</summary>
<br>
<p>
<b><code>quote_vehicles[].year</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="quote_vehicles.0.year" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].make</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_vehicles.0.make" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].model</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_vehicles.0.model" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].vin</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="quote_vehicles.0.vin" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].is_running</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" hidden><input type="radio" name="quote_vehicles.0.is_running" value="true" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" hidden><input type="radio" name="quote_vehicles.0.is_running" value="false" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" ><code>false</code></label>
<br>
</p>
<p>
<b><code>quote_vehicles[].size</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_vehicles.0.size" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>8</code>, <code>7</code>, <code>9</code>, <code>10</code>, <code>11</code>, <code>12</code>, <code>13</code>, <code>14</code>, <code>15</code>, <code>16</code>, <code>17</code>, <code>18</code>, <code>19</code>, <code>20</code>, <code>21</code>, <code>22</code>, <code>23</code>, <code>24</code>, <code>25</code>, <code>26</code>, <code>27</code>, <code>28</code>, <code>29</code>, <code>30</code>, <code>31</code>, or <code>32</code>.</p>
<p>
<b><code>quote_vehicles[].price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="quote_vehicles.0.price" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
</details>
</p>
<p>
<b><code>carrier_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="carrier_type" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code> or <code>2</code>.</p>
<p>
<b><code>available_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="available_date" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be a valid date. The value must be a valid date in the format Y/m/d.</p>
<p>
<b><code>delivery_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="delivery_date" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be a valid date. The value must be a valid date in the format Y/m/d.</p>
<p>
<b><code>delivery_accuracy</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="delivery_accuracy" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, or <code>4</code>.</p>
<p>
<b><code>distance</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="distance" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="price" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>deposit</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="deposit" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>status</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="status" data-endpoint="POSTapi-v1-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code>, <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>7</code>, <code>8</code>, or <code>9</code>.</p>

</form>


## api/v1/shipper/{shipper}/settings/{setting}




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/v1/shipper/quam/settings/quia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/v1/shipper/quam/settings/quia"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-v1-shipper--shipper--settings--setting-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-shipper--shipper--settings--setting-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-shipper--shipper--settings--setting-"></code></pre>
</div>
<div id="execution-error-GETapi-v1-shipper--shipper--settings--setting-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-shipper--shipper--settings--setting-"></code></pre>
</div>
<form id="form-GETapi-v1-shipper--shipper--settings--setting-" data-method="GET" data-path="api/v1/shipper/{shipper}/settings/{setting}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-shipper--shipper--settings--setting-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-v1-shipper--shipper--settings--setting-" onclick="tryItOut('GETapi-v1-shipper--shipper--settings--setting-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-v1-shipper--shipper--settings--setting-" onclick="cancelTryOut('GETapi-v1-shipper--shipper--settings--setting-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-v1-shipper--shipper--settings--setting-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/shipper/{shipper}/settings/{setting}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-v1-shipper--shipper--settings--setting-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>setting</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="setting" data-endpoint="GETapi-v1-shipper--shipper--settings--setting-" data-component="url" required  hidden>
<br>
</p>
</form>


## widget/quick-quote




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/widget/quick-quote" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"pub":"et"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/widget/quick-quote"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "pub": "et"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (500):

```json
{
    "message": "Public key is invalid",
    "exception": "Illuminate\\Validation\\UnauthorizedException",
    "file": "\/app\/app\/Http\/Middleware\/ExternalAccess.php",
    "line": 41,
    "trace": [
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "App\\Http\\Middleware\\ExternalAccess",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 693,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 668,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 634,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 623,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 87,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 118,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "call_user_func_array"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 95,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 39,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 596,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 258,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 920,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 266,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 142,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETwidget-quick-quote" hidden>
    <blockquote>Received response<span id="execution-response-status-GETwidget-quick-quote"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETwidget-quick-quote"></code></pre>
</div>
<div id="execution-error-GETwidget-quick-quote" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETwidget-quick-quote"></code></pre>
</div>
<form id="form-GETwidget-quick-quote" data-method="GET" data-path="widget/quick-quote" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETwidget-quick-quote', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETwidget-quick-quote" onclick="tryItOut('GETwidget-quick-quote');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETwidget-quick-quote" onclick="cancelTryOut('GETwidget-quick-quote');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETwidget-quick-quote" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>widget/quick-quote</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>pub</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="pub" data-endpoint="GETwidget-quick-quote" data-component="body" required  hidden>
<br>
</p>

</form>


## api/userinfo




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/userinfo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/userinfo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-userinfo" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-userinfo"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-userinfo"></code></pre>
</div>
<div id="execution-error-GETapi-userinfo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-userinfo"></code></pre>
</div>
<form id="form-GETapi-userinfo" data-method="GET" data-path="api/userinfo" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-userinfo', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-userinfo" onclick="tryItOut('GETapi-userinfo');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-userinfo" onclick="cancelTryOut('GETapi-userinfo');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-userinfo" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/userinfo</code></b>
</p>
</form>


## api/clientinfo




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/clientinfo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/clientinfo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-clientinfo" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-clientinfo"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-clientinfo"></code></pre>
</div>
<div id="execution-error-GETapi-clientinfo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-clientinfo"></code></pre>
</div>
<form id="form-GETapi-clientinfo" data-method="GET" data-path="api/clientinfo" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-clientinfo', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-clientinfo" onclick="tryItOut('GETapi-clientinfo');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-clientinfo" onclick="cancelTryOut('GETapi-clientinfo');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-clientinfo" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/clientinfo</code></b>
</p>
</form>


## api/role




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/role" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/role"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-role" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-role"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-role"></code></pre>
</div>
<div id="execution-error-GETapi-role" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-role"></code></pre>
</div>
<form id="form-GETapi-role" data-method="GET" data-path="api/role" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-role', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-role" onclick="tryItOut('GETapi-role');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-role" onclick="cancelTryOut('GETapi-role');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-role" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/role</code></b>
</p>
</form>


## api/change-password




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/change-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"password":"aut"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/change-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "password": "aut"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-change-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-change-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-change-password"></code></pre>
</div>
<div id="execution-error-POSTapi-change-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-change-password"></code></pre>
</div>
<form id="form-POSTapi-change-password" data-method="POST" data-path="api/change-password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-change-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-change-password" onclick="tryItOut('POSTapi-change-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-change-password" onclick="cancelTryOut('POSTapi-change-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-change-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/change-password</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-change-password" data-component="body" required  hidden>
<br>
</p>

</form>


## api/send-credentials




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/send-credentials" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"doloremque","email":"waino65@example.org","password":"ut"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/send-credentials"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "doloremque",
    "email": "waino65@example.org",
    "password": "ut"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-send-credentials" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-send-credentials"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-send-credentials"></code></pre>
</div>
<div id="execution-error-POSTapi-send-credentials" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-send-credentials"></code></pre>
</div>
<form id="form-POSTapi-send-credentials" data-method="POST" data-path="api/send-credentials" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-send-credentials', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-send-credentials" onclick="tryItOut('POSTapi-send-credentials');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-send-credentials" onclick="cancelTryOut('POSTapi-send-credentials');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-send-credentials" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/send-credentials</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-send-credentials" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-send-credentials" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-send-credentials" data-component="body" required  hidden>
<br>
</p>

</form>


## api/can/manage-users




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/can/manage-users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"modi"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/can/manage-users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "modi"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-can-manage-users" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-can-manage-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-can-manage-users"></code></pre>
</div>
<div id="execution-error-POSTapi-can-manage-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-can-manage-users"></code></pre>
</div>
<form id="form-POSTapi-can-manage-users" data-method="POST" data-path="api/can/manage-users" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-can-manage-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-can-manage-users" onclick="tryItOut('POSTapi-can-manage-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-can-manage-users" onclick="cancelTryOut('POSTapi-can-manage-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-can-manage-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/can/manage-users</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-can-manage-users" data-component="body" required  hidden>
<br>
</p>

</form>


## api/can/manage-contacts




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/can/manage-contacts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"asperiores"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/can/manage-contacts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "asperiores"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-can-manage-contacts" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-can-manage-contacts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-can-manage-contacts"></code></pre>
</div>
<div id="execution-error-POSTapi-can-manage-contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-can-manage-contacts"></code></pre>
</div>
<form id="form-POSTapi-can-manage-contacts" data-method="POST" data-path="api/can/manage-contacts" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-can-manage-contacts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-can-manage-contacts" onclick="tryItOut('POSTapi-can-manage-contacts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-can-manage-contacts" onclick="cancelTryOut('POSTapi-can-manage-contacts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-can-manage-contacts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/can/manage-contacts</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-can-manage-contacts" data-component="body" required  hidden>
<br>
</p>

</form>


## api/can/see-quotes




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/can/see-quotes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"est"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/can/see-quotes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "est"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-can-see-quotes" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-can-see-quotes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-can-see-quotes"></code></pre>
</div>
<div id="execution-error-POSTapi-can-see-quotes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-can-see-quotes"></code></pre>
</div>
<form id="form-POSTapi-can-see-quotes" data-method="POST" data-path="api/can/see-quotes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-can-see-quotes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-can-see-quotes" onclick="tryItOut('POSTapi-can-see-quotes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-can-see-quotes" onclick="cancelTryOut('POSTapi-can-see-quotes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-can-see-quotes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/can/see-quotes</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-can-see-quotes" data-component="body" required  hidden>
<br>
</p>

</form>


## api/can/create-quotes




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/can/create-quotes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"deleniti"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/can/create-quotes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "deleniti"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-can-create-quotes" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-can-create-quotes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-can-create-quotes"></code></pre>
</div>
<div id="execution-error-POSTapi-can-create-quotes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-can-create-quotes"></code></pre>
</div>
<form id="form-POSTapi-can-create-quotes" data-method="POST" data-path="api/can/create-quotes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-can-create-quotes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-can-create-quotes" onclick="tryItOut('POSTapi-can-create-quotes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-can-create-quotes" onclick="cancelTryOut('POSTapi-can-create-quotes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-can-create-quotes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/can/create-quotes</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-can-create-quotes" data-component="body" required  hidden>
<br>
</p>

</form>


## api/can/get-quote




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/can/get-quote" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"quote_id":17}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/can/get-quote"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "quote_id": 17
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-can-get-quote" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-can-get-quote"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-can-get-quote"></code></pre>
</div>
<div id="execution-error-POSTapi-can-get-quote" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-can-get-quote"></code></pre>
</div>
<form id="form-POSTapi-can-get-quote" data-method="POST" data-path="api/can/get-quote" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-can-get-quote', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-can-get-quote" onclick="tryItOut('POSTapi-can-get-quote');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-can-get-quote" onclick="cancelTryOut('POSTapi-can-get-quote');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-can-get-quote" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/can/get-quote</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>quote_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="quote_id" data-endpoint="POSTapi-can-get-quote" data-component="body" required  hidden>
<br>
</p>

</form>


## api/can/edit-quote




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/can/edit-quote" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"quote_id":8}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/can/edit-quote"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "quote_id": 8
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-can-edit-quote" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-can-edit-quote"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-can-edit-quote"></code></pre>
</div>
<div id="execution-error-POSTapi-can-edit-quote" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-can-edit-quote"></code></pre>
</div>
<form id="form-POSTapi-can-edit-quote" data-method="POST" data-path="api/can/edit-quote" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-can-edit-quote', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-can-edit-quote" onclick="tryItOut('POSTapi-can-edit-quote');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-can-edit-quote" onclick="cancelTryOut('POSTapi-can-edit-quote');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-can-edit-quote" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/can/edit-quote</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>quote_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="quote_id" data-endpoint="POSTapi-can-edit-quote" data-component="body" required  hidden>
<br>
</p>

</form>


## api/can/see-loads




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/can/see-loads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"iusto"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/can/see-loads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "iusto"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-can-see-loads" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-can-see-loads"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-can-see-loads"></code></pre>
</div>
<div id="execution-error-POSTapi-can-see-loads" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-can-see-loads"></code></pre>
</div>
<form id="form-POSTapi-can-see-loads" data-method="POST" data-path="api/can/see-loads" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-can-see-loads', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-can-see-loads" onclick="tryItOut('POSTapi-can-see-loads');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-can-see-loads" onclick="cancelTryOut('POSTapi-can-see-loads');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-can-see-loads" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/can/see-loads</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-can-see-loads" data-component="body" required  hidden>
<br>
</p>

</form>


## api/can/create-loads




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/can/create-loads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"quas"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/can/create-loads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "quas"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-can-create-loads" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-can-create-loads"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-can-create-loads"></code></pre>
</div>
<div id="execution-error-POSTapi-can-create-loads" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-can-create-loads"></code></pre>
</div>
<form id="form-POSTapi-can-create-loads" data-method="POST" data-path="api/can/create-loads" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-can-create-loads', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-can-create-loads" onclick="tryItOut('POSTapi-can-create-loads');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-can-create-loads" onclick="cancelTryOut('POSTapi-can-create-loads');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-can-create-loads" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/can/create-loads</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-can-create-loads" data-component="body" required  hidden>
<br>
</p>

</form>


## api/can/get-load




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/can/get-load" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"load_id":3}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/can/get-load"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "load_id": 3
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-can-get-load" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-can-get-load"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-can-get-load"></code></pre>
</div>
<div id="execution-error-POSTapi-can-get-load" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-can-get-load"></code></pre>
</div>
<form id="form-POSTapi-can-get-load" data-method="POST" data-path="api/can/get-load" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-can-get-load', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-can-get-load" onclick="tryItOut('POSTapi-can-get-load');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-can-get-load" onclick="cancelTryOut('POSTapi-can-get-load');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-can-get-load" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/can/get-load</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>load_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="load_id" data-endpoint="POSTapi-can-get-load" data-component="body" required  hidden>
<br>
</p>

</form>


## api/can/edit-load




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/can/edit-load" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"load_id":10}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/can/edit-load"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "load_id": 10
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-can-edit-load" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-can-edit-load"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-can-edit-load"></code></pre>
</div>
<div id="execution-error-POSTapi-can-edit-load" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-can-edit-load"></code></pre>
</div>
<form id="form-POSTapi-can-edit-load" data-method="POST" data-path="api/can/edit-load" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-can-edit-load', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-can-edit-load" onclick="tryItOut('POSTapi-can-edit-load');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-can-edit-load" onclick="cancelTryOut('POSTapi-can-edit-load');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-can-edit-load" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/can/edit-load</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>load_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="load_id" data-endpoint="POSTapi-can-edit-load" data-component="body" required  hidden>
<br>
</p>

</form>


## api/can/edit-email-templates




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/can/edit-email-templates" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"possimus"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/can/edit-email-templates"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "possimus"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-can-edit-email-templates" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-can-edit-email-templates"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-can-edit-email-templates"></code></pre>
</div>
<div id="execution-error-POSTapi-can-edit-email-templates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-can-edit-email-templates"></code></pre>
</div>
<form id="form-POSTapi-can-edit-email-templates" data-method="POST" data-path="api/can/edit-email-templates" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-can-edit-email-templates', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-can-edit-email-templates" onclick="tryItOut('POSTapi-can-edit-email-templates');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-can-edit-email-templates" onclick="cancelTryOut('POSTapi-can-edit-email-templates');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-can-edit-email-templates" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/can/edit-email-templates</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-can-edit-email-templates" data-component="body" required  hidden>
<br>
</p>

</form>


## api/user/request-email-change




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/user/request-email-change" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"crona.casandra@example.net","old_email":"juana.mohr@example.net"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/user/request-email-change"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "crona.casandra@example.net",
    "old_email": "juana.mohr@example.net"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-user-request-email-change" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-request-email-change"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-request-email-change"></code></pre>
</div>
<div id="execution-error-POSTapi-user-request-email-change" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-request-email-change"></code></pre>
</div>
<form id="form-POSTapi-user-request-email-change" data-method="POST" data-path="api/user/request-email-change" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-request-email-change', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-request-email-change" onclick="tryItOut('POSTapi-user-request-email-change');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-request-email-change" onclick="cancelTryOut('POSTapi-user-request-email-change');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-request-email-change" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user/request-email-change</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-user-request-email-change" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>old_email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="old_email" data-endpoint="POSTapi-user-request-email-change" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>

</form>


## api/zip/{zip}/autocomplete




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/zip/ea/autocomplete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"zip":"culpa"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/zip/ea/autocomplete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "zip": "culpa"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (422):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "zip": [
            "The zip must be at least 3 characters."
        ]
    }
}
```
<div id="execution-results-GETapi-zip--zip--autocomplete" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-zip--zip--autocomplete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-zip--zip--autocomplete"></code></pre>
</div>
<div id="execution-error-GETapi-zip--zip--autocomplete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-zip--zip--autocomplete"></code></pre>
</div>
<form id="form-GETapi-zip--zip--autocomplete" data-method="GET" data-path="api/zip/{zip}/autocomplete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-zip--zip--autocomplete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-zip--zip--autocomplete" onclick="tryItOut('GETapi-zip--zip--autocomplete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-zip--zip--autocomplete" onclick="cancelTryOut('GETapi-zip--zip--autocomplete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-zip--zip--autocomplete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/zip/{zip}/autocomplete</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="zip" data-endpoint="GETapi-zip--zip--autocomplete" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="zip" data-endpoint="GETapi-zip--zip--autocomplete" data-component="body" required  hidden>
<br>
</p>

</form>


## api/city/{city}/autocomplete




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/city/explicabo/autocomplete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"city":"porro"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/city/explicabo/autocomplete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "city": "porro"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "data": {
        "predictions": [],
        "status": "ZERO_RESULTS"
    }
}
```
<div id="execution-results-GETapi-city--city--autocomplete" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-city--city--autocomplete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-city--city--autocomplete"></code></pre>
</div>
<div id="execution-error-GETapi-city--city--autocomplete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-city--city--autocomplete"></code></pre>
</div>
<form id="form-GETapi-city--city--autocomplete" data-method="GET" data-path="api/city/{city}/autocomplete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-city--city--autocomplete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-city--city--autocomplete" onclick="tryItOut('GETapi-city--city--autocomplete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-city--city--autocomplete" onclick="cancelTryOut('GETapi-city--city--autocomplete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-city--city--autocomplete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/city/{city}/autocomplete</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="city" data-endpoint="GETapi-city--city--autocomplete" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="city" data-endpoint="GETapi-city--city--autocomplete" data-component="body" required  hidden>
<br>
</p>

</form>


## api/place/{place}/details




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/place/veniam/details" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"place_id":"culpa"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/place/veniam/details"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "place_id": "culpa"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "data": []
}
```
<div id="execution-results-GETapi-place--place--details" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-place--place--details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-place--place--details"></code></pre>
</div>
<div id="execution-error-GETapi-place--place--details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-place--place--details"></code></pre>
</div>
<form id="form-GETapi-place--place--details" data-method="GET" data-path="api/place/{place}/details" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-place--place--details', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-place--place--details" onclick="tryItOut('GETapi-place--place--details');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-place--place--details" onclick="cancelTryOut('GETapi-place--place--details');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-place--place--details" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/place/{place}/details</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>place</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="place" data-endpoint="GETapi-place--place--details" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>place_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="place_id" data-endpoint="GETapi-place--place--details" data-component="body" required  hidden>
<br>
</p>

</form>


## api/quote-statuses-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/quote-statuses-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/quote-statuses-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-quote-statuses-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-quote-statuses-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-quote-statuses-data"></code></pre>
</div>
<div id="execution-error-GETapi-quote-statuses-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-quote-statuses-data"></code></pre>
</div>
<form id="form-GETapi-quote-statuses-data" data-method="GET" data-path="api/quote-statuses-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-quote-statuses-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-quote-statuses-data" onclick="tryItOut('GETapi-quote-statuses-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-quote-statuses-data" onclick="cancelTryOut('GETapi-quote-statuses-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-quote-statuses-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/quote-statuses-data</code></b>
</p>
</form>


## api/load-statuses-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/load-statuses-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/load-statuses-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-load-statuses-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-load-statuses-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-load-statuses-data"></code></pre>
</div>
<div id="execution-error-GETapi-load-statuses-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-load-statuses-data"></code></pre>
</div>
<form id="form-GETapi-load-statuses-data" data-method="GET" data-path="api/load-statuses-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-load-statuses-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-load-statuses-data" onclick="tryItOut('GETapi-load-statuses-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-load-statuses-data" onclick="cancelTryOut('GETapi-load-statuses-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-load-statuses-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/load-statuses-data</code></b>
</p>
</form>


## api/states-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/states-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/states-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-states-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-states-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-states-data"></code></pre>
</div>
<div id="execution-error-GETapi-states-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-states-data"></code></pre>
</div>
<form id="form-GETapi-states-data" data-method="GET" data-path="api/states-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-states-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-states-data" onclick="tryItOut('GETapi-states-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-states-data" onclick="cancelTryOut('GETapi-states-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-states-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/states-data</code></b>
</p>
</form>


## api/carrier-types-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/carrier-types-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/carrier-types-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-carrier-types-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-carrier-types-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-carrier-types-data"></code></pre>
</div>
<div id="execution-error-GETapi-carrier-types-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-carrier-types-data"></code></pre>
</div>
<form id="form-GETapi-carrier-types-data" data-method="GET" data-path="api/carrier-types-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-carrier-types-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-carrier-types-data" onclick="tryItOut('GETapi-carrier-types-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-carrier-types-data" onclick="cancelTryOut('GETapi-carrier-types-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-carrier-types-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/carrier-types-data</code></b>
</p>
</form>


## api/car-sizes-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/car-sizes-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/car-sizes-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-car-sizes-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-car-sizes-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-car-sizes-data"></code></pre>
</div>
<div id="execution-error-GETapi-car-sizes-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-car-sizes-data"></code></pre>
</div>
<form id="form-GETapi-car-sizes-data" data-method="GET" data-path="api/car-sizes-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-car-sizes-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-car-sizes-data" onclick="tryItOut('GETapi-car-sizes-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-car-sizes-data" onclick="cancelTryOut('GETapi-car-sizes-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-car-sizes-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/car-sizes-data</code></b>
</p>
</form>


## api/available-accuracy-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/available-accuracy-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/available-accuracy-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-available-accuracy-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-available-accuracy-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-available-accuracy-data"></code></pre>
</div>
<div id="execution-error-GETapi-available-accuracy-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-available-accuracy-data"></code></pre>
</div>
<form id="form-GETapi-available-accuracy-data" data-method="GET" data-path="api/available-accuracy-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-available-accuracy-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-available-accuracy-data" onclick="tryItOut('GETapi-available-accuracy-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-available-accuracy-data" onclick="cancelTryOut('GETapi-available-accuracy-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-available-accuracy-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/available-accuracy-data</code></b>
</p>
</form>


## api/delivery-accuracy-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/delivery-accuracy-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/delivery-accuracy-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-delivery-accuracy-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-delivery-accuracy-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-delivery-accuracy-data"></code></pre>
</div>
<div id="execution-error-GETapi-delivery-accuracy-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-delivery-accuracy-data"></code></pre>
</div>
<form id="form-GETapi-delivery-accuracy-data" data-method="GET" data-path="api/delivery-accuracy-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-delivery-accuracy-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-delivery-accuracy-data" onclick="tryItOut('GETapi-delivery-accuracy-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-delivery-accuracy-data" onclick="cancelTryOut('GETapi-delivery-accuracy-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-delivery-accuracy-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/delivery-accuracy-data</code></b>
</p>
</form>


## api/carrier-pay-terms-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/carrier-pay-terms-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/carrier-pay-terms-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-carrier-pay-terms-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-carrier-pay-terms-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-carrier-pay-terms-data"></code></pre>
</div>
<div id="execution-error-GETapi-carrier-pay-terms-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-carrier-pay-terms-data"></code></pre>
</div>
<form id="form-GETapi-carrier-pay-terms-data" data-method="GET" data-path="api/carrier-pay-terms-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-carrier-pay-terms-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-carrier-pay-terms-data" onclick="tryItOut('GETapi-carrier-pay-terms-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-carrier-pay-terms-data" onclick="cancelTryOut('GETapi-carrier-pay-terms-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-carrier-pay-terms-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/carrier-pay-terms-data</code></b>
</p>
</form>


## api/customer-pay-terms-data




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/customer-pay-terms-data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/customer-pay-terms-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-customer-pay-terms-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-customer-pay-terms-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-customer-pay-terms-data"></code></pre>
</div>
<div id="execution-error-GETapi-customer-pay-terms-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-customer-pay-terms-data"></code></pre>
</div>
<form id="form-GETapi-customer-pay-terms-data" data-method="GET" data-path="api/customer-pay-terms-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-customer-pay-terms-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-customer-pay-terms-data" onclick="tryItOut('GETapi-customer-pay-terms-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-customer-pay-terms-data" onclick="cancelTryOut('GETapi-customer-pay-terms-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-customer-pay-terms-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/customer-pay-terms-data</code></b>
</p>
</form>


## api/calculate-price




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/calculate-price" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"origin_zip":"officia","destination_zip":"voluptates","shipper_id":"maxime"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/calculate-price"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "origin_zip": "officia",
    "destination_zip": "voluptates",
    "shipper_id": "maxime"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-calculate-price" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-calculate-price"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-calculate-price"></code></pre>
</div>
<div id="execution-error-POSTapi-calculate-price" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-calculate-price"></code></pre>
</div>
<form id="form-POSTapi-calculate-price" data-method="POST" data-path="api/calculate-price" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-calculate-price', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-calculate-price" onclick="tryItOut('POSTapi-calculate-price');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-calculate-price" onclick="cancelTryOut('POSTapi-calculate-price');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-calculate-price" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/calculate-price</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>origin_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="origin_zip" data-endpoint="POSTapi-calculate-price" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>destination_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="destination_zip" data-endpoint="POSTapi-calculate-price" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-calculate-price" data-component="body" required  hidden>
<br>
</p>

</form>


## api/upload-avatar




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/upload-avatar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"file":"quas"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/upload-avatar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "file": "quas"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-upload-avatar" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-upload-avatar"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-upload-avatar"></code></pre>
</div>
<div id="execution-error-POSTapi-upload-avatar" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-upload-avatar"></code></pre>
</div>
<form id="form-POSTapi-upload-avatar" data-method="POST" data-path="api/upload-avatar" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-upload-avatar', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-upload-avatar" onclick="tryItOut('POSTapi-upload-avatar');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-upload-avatar" onclick="cancelTryOut('POSTapi-upload-avatar');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-upload-avatar" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/upload-avatar</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>file</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="file" data-endpoint="POSTapi-upload-avatar" data-component="body" required  hidden>
<br>
</p>

</form>


## api/profile




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-profile" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-profile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-profile"></code></pre>
</div>
<div id="execution-error-POSTapi-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-profile"></code></pre>
</div>
<form id="form-POSTapi-profile" data-method="POST" data-path="api/profile" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-profile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-profile" onclick="tryItOut('POSTapi-profile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-profile" onclick="cancelTryOut('POSTapi-profile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-profile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/profile</code></b>
</p>
</form>


## api/shipper/{shipper}/assign-driver-to-load




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/incidunt/assign-driver-to-load" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"voluptatem","load_id":"sint","driver_id":"aperiam"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/incidunt/assign-driver-to-load"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "voluptatem",
    "load_id": "sint",
    "driver_id": "aperiam"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--assign-driver-to-load" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--assign-driver-to-load"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--assign-driver-to-load"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--assign-driver-to-load" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--assign-driver-to-load"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--assign-driver-to-load" data-method="POST" data-path="api/shipper/{shipper}/assign-driver-to-load" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--assign-driver-to-load', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--assign-driver-to-load" onclick="tryItOut('POSTapi-shipper--shipper--assign-driver-to-load');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--assign-driver-to-load" onclick="cancelTryOut('POSTapi-shipper--shipper--assign-driver-to-load');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--assign-driver-to-load" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/assign-driver-to-load</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--assign-driver-to-load" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--assign-driver-to-load" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_id" data-endpoint="POSTapi-shipper--shipper--assign-driver-to-load" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>driver_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="driver_id" data-endpoint="POSTapi-shipper--shipper--assign-driver-to-load" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/settings




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/possimus/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"saepe","price_per_mile":12}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/possimus/settings"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "saepe",
    "price_per_mile": 12
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--settings" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--settings"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--settings"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--settings"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--settings" data-method="POST" data-path="api/shipper/{shipper}/settings" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--settings', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--settings" onclick="tryItOut('POSTapi-shipper--shipper--settings');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--settings" onclick="cancelTryOut('POSTapi-shipper--shipper--settings');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--settings" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/settings</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--settings" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--settings" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>price_per_mile</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="price_per_mile" data-endpoint="POSTapi-shipper--shipper--settings" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/contacts




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/doloribus/contacts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"sunt"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/doloribus/contacts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "sunt"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (422):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "shipper_id": [
            "The selected shipper id is invalid."
        ]
    }
}
```
<div id="execution-results-GETapi-shipper--shipper--contacts" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--contacts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--contacts"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--contacts"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--contacts" data-method="GET" data-path="api/shipper/{shipper}/contacts" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--contacts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--contacts" onclick="tryItOut('GETapi-shipper--shipper--contacts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--contacts" onclick="cancelTryOut('GETapi-shipper--shipper--contacts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--contacts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/contacts</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--contacts" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="GETapi-shipper--shipper--contacts" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/customers




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/inventore/customers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"eos","name":"commodi","type":"Individual","company":"qui","address":"autem","phone":"id","fax":"aspernatur","email":"otis51@example.net"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/inventore/customers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "eos",
    "name": "commodi",
    "type": "Individual",
    "company": "qui",
    "address": "autem",
    "phone": "id",
    "fax": "aspernatur",
    "email": "otis51@example.net"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--customers" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--customers"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--customers"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--customers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--customers"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--customers" data-method="POST" data-path="api/shipper/{shipper}/customers" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--customers', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--customers" onclick="tryItOut('POSTapi-shipper--shipper--customers');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--customers" onclick="cancelTryOut('POSTapi-shipper--shipper--customers');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--customers" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/customers</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--customers" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--customers" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-shipper--shipper--customers" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-shipper--shipper--customers" data-component="body" required  hidden>
<br>
The value must be one of <code>Business</code> or <code>Individual</code>.</p>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="POSTapi-shipper--shipper--customers" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="address" data-endpoint="POSTapi-shipper--shipper--customers" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--customers" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>fax</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="fax" data-endpoint="POSTapi-shipper--shipper--customers" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--customers" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>

</form>


## api/shipper/{shipper}/customers/{customer}




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/aliquam/customers/voluptas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"doloremque","customer_id":"exercitationem","name":"explicabo","type":"Individual","company":"voluptas","address":"consequuntur","phone":"recusandae","fax":"molestiae","email":"qturcotte@example.com"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/aliquam/customers/voluptas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "doloremque",
    "customer_id": "exercitationem",
    "name": "explicabo",
    "type": "Individual",
    "company": "voluptas",
    "address": "consequuntur",
    "phone": "recusandae",
    "fax": "molestiae",
    "email": "qturcotte@example.com"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--customers--customer-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--customers--customer-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--customers--customer-"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--customers--customer-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--customers--customer-"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--customers--customer-" data-method="POST" data-path="api/shipper/{shipper}/customers/{customer}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--customers--customer-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--customers--customer-" onclick="tryItOut('POSTapi-shipper--shipper--customers--customer-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--customers--customer-" onclick="cancelTryOut('POSTapi-shipper--shipper--customers--customer-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--customers--customer-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/customers/{customer}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--customers--customer-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>customer</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="customer" data-endpoint="POSTapi-shipper--shipper--customers--customer-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--customers--customer-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>customer_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="customer_id" data-endpoint="POSTapi-shipper--shipper--customers--customer-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-shipper--shipper--customers--customer-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-shipper--shipper--customers--customer-" data-component="body" required  hidden>
<br>
The value must be one of <code>Business</code> or <code>Individual</code>.</p>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="POSTapi-shipper--shipper--customers--customer-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="address" data-endpoint="POSTapi-shipper--shipper--customers--customer-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--customers--customer-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>fax</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="fax" data-endpoint="POSTapi-shipper--shipper--customers--customer-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--customers--customer-" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>

</form>


## api/shipper/{shipper}/customers/{customer}/delete




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/quae/customers/asperiores/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"cumque","customer_id":"exercitationem"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/quae/customers/asperiores/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "cumque",
    "customer_id": "exercitationem"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--customers--customer--delete" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--customers--customer--delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--customers--customer--delete"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--customers--customer--delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--customers--customer--delete"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--customers--customer--delete" data-method="POST" data-path="api/shipper/{shipper}/customers/{customer}/delete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--customers--customer--delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--customers--customer--delete" onclick="tryItOut('POSTapi-shipper--shipper--customers--customer--delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--customers--customer--delete" onclick="cancelTryOut('POSTapi-shipper--shipper--customers--customer--delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--customers--customer--delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/customers/{customer}/delete</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--customers--customer--delete" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>customer</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="customer" data-endpoint="POSTapi-shipper--shipper--customers--customer--delete" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--customers--customer--delete" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>customer_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="customer_id" data-endpoint="POSTapi-shipper--shipper--customers--customer--delete" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/customers/{customer}/contacts




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/et/customers/tempora/contacts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"magnam","customer_id":"et","name":"magni","phone":"et","email":"terence.crooks@example.org"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/et/customers/tempora/contacts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "magnam",
    "customer_id": "et",
    "name": "magni",
    "phone": "et",
    "email": "terence.crooks@example.org"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--customers--customer--contacts" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--customers--customer--contacts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--customers--customer--contacts"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--customers--customer--contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--customers--customer--contacts"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--customers--customer--contacts" data-method="POST" data-path="api/shipper/{shipper}/customers/{customer}/contacts" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--customers--customer--contacts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--customers--customer--contacts" onclick="tryItOut('POSTapi-shipper--shipper--customers--customer--contacts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--customers--customer--contacts" onclick="cancelTryOut('POSTapi-shipper--shipper--customers--customer--contacts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--customers--customer--contacts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/customers/{customer}/contacts</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>customer</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="customer" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>customer_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="customer_id" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>

</form>


## api/shipper/{shipper}/customers/{customer}/contacts/{contact}




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/dolorem/customers/ratione/contacts/modi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"deserunt","customer_id":"laudantium","contact_id":"perferendis","name":"blanditiis","phone":"sunt","email":"christina84@example.org"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/dolorem/customers/ratione/contacts/modi"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "deserunt",
    "customer_id": "laudantium",
    "contact_id": "perferendis",
    "name": "blanditiis",
    "phone": "sunt",
    "email": "christina84@example.org"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--customers--customer--contacts--contact-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--customers--customer--contacts--contact-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--customers--customer--contacts--contact-"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--customers--customer--contacts--contact-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--customers--customer--contacts--contact-"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--customers--customer--contacts--contact-" data-method="POST" data-path="api/shipper/{shipper}/customers/{customer}/contacts/{contact}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--customers--customer--contacts--contact-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--customers--customer--contacts--contact-" onclick="tryItOut('POSTapi-shipper--shipper--customers--customer--contacts--contact-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--customers--customer--contacts--contact-" onclick="cancelTryOut('POSTapi-shipper--shipper--customers--customer--contacts--contact-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--customers--customer--contacts--contact-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/customers/{customer}/contacts/{contact}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>customer</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="customer" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>contact</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="contact" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>customer_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="customer_id" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>contact_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="contact_id" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact-" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>

</form>


## api/shipper/{shipper}/customers/{customer}/contacts/{contact}/delete




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/quam/customers/mollitia/contacts/quis/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"est","customer_id":"sit","contact_id":"asperiores"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/quam/customers/mollitia/contacts/quis/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "est",
    "customer_id": "sit",
    "contact_id": "asperiores"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--customers--customer--contacts--contact--delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--customers--customer--contacts--contact--delete"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--customers--customer--contacts--contact--delete"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" data-method="POST" data-path="api/shipper/{shipper}/customers/{customer}/contacts/{contact}/delete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--customers--customer--contacts--contact--delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" onclick="tryItOut('POSTapi-shipper--shipper--customers--customer--contacts--contact--delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" onclick="cancelTryOut('POSTapi-shipper--shipper--customers--customer--contacts--contact--delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/customers/{customer}/contacts/{contact}/delete</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>customer</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="customer" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>contact</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="contact" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>customer_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="customer_id" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>contact_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="contact_id" data-endpoint="POSTapi-shipper--shipper--customers--customer--contacts--contact--delete" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/users




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/tempora/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/tempora/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper--shipper--users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--users"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--users"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--users" data-method="GET" data-path="api/shipper/{shipper}/users" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--users" onclick="tryItOut('GETapi-shipper--shipper--users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--users" onclick="cancelTryOut('GETapi-shipper--shipper--users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/users</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--users" data-component="url" required  hidden>
<br>
</p>
</form>


## api/shipper/{shipper}/users




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/in/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"tyrel.kirlin@example.org","role":4,"first_name":"nisi","last_name":"consequatur","phone":"voluptatem","shipper_id":"cupiditate","password":"molestiae","ask_password_change_next_login":false}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/in/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "tyrel.kirlin@example.org",
    "role": 4,
    "first_name": "nisi",
    "last_name": "consequatur",
    "phone": "voluptatem",
    "shipper_id": "cupiditate",
    "password": "molestiae",
    "ask_password_change_next_login": false
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--users" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--users"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--users"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--users" data-method="POST" data-path="api/shipper/{shipper}/users" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--users" onclick="tryItOut('POSTapi-shipper--shipper--users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--users" onclick="cancelTryOut('POSTapi-shipper--shipper--users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/users</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--users" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--users" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>role</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="role" data-endpoint="POSTapi-shipper--shipper--users" data-component="body" required  hidden>
<br>
The value must be one of <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, or <code>7</code>.</p>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-shipper--shipper--users" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-shipper--shipper--users" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--users" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--users" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-shipper--shipper--users" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>ask_password_change_next_login</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-shipper--shipper--users" hidden><input type="radio" name="ask_password_change_next_login" value="true" data-endpoint="POSTapi-shipper--shipper--users" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-shipper--shipper--users" hidden><input type="radio" name="ask_password_change_next_login" value="false" data-endpoint="POSTapi-shipper--shipper--users" data-component="body" ><code>false</code></label>
<br>
</p>

</form>


## api/shipper/{shipper}/users/{user}




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/nostrum/users/voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"nkoch@example.net","shipper_id":"necessitatibus","user_id":"inventore","first_name":"corporis","last_name":"quia","phone":"modi","role":3,"status":1}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/nostrum/users/voluptatem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "nkoch@example.net",
    "shipper_id": "necessitatibus",
    "user_id": "inventore",
    "first_name": "corporis",
    "last_name": "quia",
    "phone": "modi",
    "role": 3,
    "status": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--users--user-"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--users--user-"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--users--user-" data-method="POST" data-path="api/shipper/{shipper}/users/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--users--user-" onclick="tryItOut('POSTapi-shipper--shipper--users--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--users--user-" onclick="cancelTryOut('POSTapi-shipper--shipper--users--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--users--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/users/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--users--user-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="POSTapi-shipper--shipper--users--user-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--users--user-" data-component="body"  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--users--user-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user_id" data-endpoint="POSTapi-shipper--shipper--users--user-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-shipper--shipper--users--user-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-shipper--shipper--users--user-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--users--user-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>role</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="role" data-endpoint="POSTapi-shipper--shipper--users--user-" data-component="body" required  hidden>
<br>
The value must be one of <code>3</code>, <code>4</code>, <code>5</code>, or <code>6</code>.</p>
<p>
<b><code>status</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="status" data-endpoint="POSTapi-shipper--shipper--users--user-" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>

</form>


## api/shipper/{shipper}/users/{user}/delete




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/assumenda/users/praesentium/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"ut","user_id":"delectus"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/assumenda/users/praesentium/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "ut",
    "user_id": "delectus"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--users--user--delete" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--users--user--delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--users--user--delete"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--users--user--delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--users--user--delete"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--users--user--delete" data-method="POST" data-path="api/shipper/{shipper}/users/{user}/delete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--users--user--delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--users--user--delete" onclick="tryItOut('POSTapi-shipper--shipper--users--user--delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--users--user--delete" onclick="cancelTryOut('POSTapi-shipper--shipper--users--user--delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--users--user--delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/users/{user}/delete</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--users--user--delete" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="POSTapi-shipper--shipper--users--user--delete" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--users--user--delete" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user_id" data-endpoint="POSTapi-shipper--shipper--users--user--delete" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/clients




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/recusandae/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/recusandae/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper--shipper--clients" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--clients"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--clients"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--clients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--clients"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--clients" data-method="GET" data-path="api/shipper/{shipper}/clients" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--clients', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--clients" onclick="tryItOut('GETapi-shipper--shipper--clients');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--clients" onclick="cancelTryOut('GETapi-shipper--shipper--clients');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--clients" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/clients</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--clients" data-component="url" required  hidden>
<br>
</p>
</form>


## api/shipper/{shipper}/clients




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/voluptatum/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"alayna.schaden@example.org","first_name":"occaecati","last_name":"temporibus","phone":"recusandae","shipper_id":"unde","password":"corrupti","ask_password_change_next_login":false,"type":"0","company":"eius","address_1":"ducimus","address_2":"corporis","zip":"ut","city":"quod","state":"NY","phone_2":"commodi","mobile":"at","fax":"dignissimos","notes_from_shipper":"illum"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/voluptatum/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "alayna.schaden@example.org",
    "first_name": "occaecati",
    "last_name": "temporibus",
    "phone": "recusandae",
    "shipper_id": "unde",
    "password": "corrupti",
    "ask_password_change_next_login": false,
    "type": "0",
    "company": "eius",
    "address_1": "ducimus",
    "address_2": "corporis",
    "zip": "ut",
    "city": "quod",
    "state": "NY",
    "phone_2": "commodi",
    "mobile": "at",
    "fax": "dignissimos",
    "notes_from_shipper": "illum"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--clients" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--clients"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--clients"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--clients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--clients"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--clients" data-method="POST" data-path="api/shipper/{shipper}/clients" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--clients', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--clients" onclick="tryItOut('POSTapi-shipper--shipper--clients');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--clients" onclick="cancelTryOut('POSTapi-shipper--shipper--clients');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--clients" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/clients</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--clients" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>ask_password_change_next_login</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-shipper--shipper--clients" hidden><input type="radio" name="ask_password_change_next_login" value="true" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-shipper--shipper--clients" hidden><input type="radio" name="ask_password_change_next_login" value="false" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body" ><code>false</code></label>
<br>
</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>address_1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_1" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>address_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_2" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="zip" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="city" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>state</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="state" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body"  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>phone_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone_2" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>mobile</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mobile" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>fax</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="fax" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>notes_from_shipper</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="notes_from_shipper" data-endpoint="POSTapi-shipper--shipper--clients" data-component="body"  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/clients/{user}




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/qui/clients/reprehenderit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"igutkowski@example.org","shipper_id":"officiis","user_id":"porro","first_name":"aut","last_name":"numquam","phone":"et","role":7,"status":1,"type":"1","company":"eligendi","address_1":"quas","address_2":"et","zip":"est","city":"quisquam","state":"MN","phone_2":"eos","mobile":"distinctio","fax":"in","notes_from_shipper":"enim"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/qui/clients/reprehenderit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "igutkowski@example.org",
    "shipper_id": "officiis",
    "user_id": "porro",
    "first_name": "aut",
    "last_name": "numquam",
    "phone": "et",
    "role": 7,
    "status": 1,
    "type": "1",
    "company": "eligendi",
    "address_1": "quas",
    "address_2": "et",
    "zip": "est",
    "city": "quisquam",
    "state": "MN",
    "phone_2": "eos",
    "mobile": "distinctio",
    "fax": "in",
    "notes_from_shipper": "enim"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--clients--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--clients--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--clients--user-"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--clients--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--clients--user-"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--clients--user-" data-method="POST" data-path="api/shipper/{shipper}/clients/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--clients--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--clients--user-" onclick="tryItOut('POSTapi-shipper--shipper--clients--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--clients--user-" onclick="cancelTryOut('POSTapi-shipper--shipper--clients--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--clients--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/clients/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body"  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user_id" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>role</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="role" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body" required  hidden>
<br>
The value must be one of <code>7</code>.</p>
<p>
<b><code>status</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="status" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>address_1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_1" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>address_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_2" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="zip" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="city" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>state</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="state" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body"  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>phone_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone_2" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>mobile</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mobile" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>fax</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="fax" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>notes_from_shipper</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="notes_from_shipper" data-endpoint="POSTapi-shipper--shipper--clients--user-" data-component="body"  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/drivers




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/qui/drivers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/qui/drivers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper--shipper--drivers" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--drivers"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--drivers"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--drivers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--drivers"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--drivers" data-method="GET" data-path="api/shipper/{shipper}/drivers" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--drivers', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--drivers" onclick="tryItOut('GETapi-shipper--shipper--drivers');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--drivers" onclick="cancelTryOut('GETapi-shipper--shipper--drivers');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--drivers" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/drivers</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--drivers" data-component="url" required  hidden>
<br>
</p>
</form>


## api/shipper/{shipper}/quotes




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/accusantium/quotes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/accusantium/quotes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper--shipper--quotes" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--quotes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--quotes"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--quotes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--quotes"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--quotes" data-method="GET" data-path="api/shipper/{shipper}/quotes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--quotes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--quotes" onclick="tryItOut('GETapi-shipper--shipper--quotes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--quotes" onclick="cancelTryOut('GETapi-shipper--shipper--quotes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--quotes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/quotes</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--quotes" data-component="url" required  hidden>
<br>
</p>
</form>


## api/shipper/{shipper}/quotes




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/optio/quotes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"client_id":{},"shipper_id":"libero","first_name":"deserunt","last_name":"et","phone":"libero","email":"umraz@example.com","type":"1","company":"facilis","address_1":"porro","address_2":"magnam","zip":"omnis","city":"dolor","state":"ME","phone_2":"perferendis","mobile":"explicabo","fax":"ea","notes_from_shipper":"sit","quote_origin_zip":"qui","quote_origin_city":"beatae","quote_origin_state":"DE","quote_destination_zip":"ut","quote_destination_city":"animi","quote_destination_state":"WI","quote_vehicles":[{"year":20,"make":"blanditiis","model":"saepe","vin":"magnam","is_running":false,"size":"22","price":29071940.5511}],"carrier_type":"1","available_date":"2020\/11\/18","delivery_date":"2020\/11\/18","delivery_accuracy":"4","distance":32944.56778,"price":7.872,"deposit":7.390859303}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/optio/quotes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "client_id": {},
    "shipper_id": "libero",
    "first_name": "deserunt",
    "last_name": "et",
    "phone": "libero",
    "email": "umraz@example.com",
    "type": "1",
    "company": "facilis",
    "address_1": "porro",
    "address_2": "magnam",
    "zip": "omnis",
    "city": "dolor",
    "state": "ME",
    "phone_2": "perferendis",
    "mobile": "explicabo",
    "fax": "ea",
    "notes_from_shipper": "sit",
    "quote_origin_zip": "qui",
    "quote_origin_city": "beatae",
    "quote_origin_state": "DE",
    "quote_destination_zip": "ut",
    "quote_destination_city": "animi",
    "quote_destination_state": "WI",
    "quote_vehicles": [
        {
            "year": 20,
            "make": "blanditiis",
            "model": "saepe",
            "vin": "magnam",
            "is_running": false,
            "size": "22",
            "price": 29071940.5511
        }
    ],
    "carrier_type": "1",
    "available_date": "2020\/11\/18",
    "delivery_date": "2020\/11\/18",
    "delivery_accuracy": "4",
    "distance": 32944.56778,
    "price": 7.872,
    "deposit": 7.390859303
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--quotes" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--quotes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--quotes"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--quotes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--quotes"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--quotes" data-method="POST" data-path="api/shipper/{shipper}/quotes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--quotes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--quotes" onclick="tryItOut('POSTapi-shipper--shipper--quotes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--quotes" onclick="cancelTryOut('POSTapi-shipper--shipper--quotes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--quotes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/quotes</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>client_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="client_id" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>address_1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_1" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>address_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_2" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="zip" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="city" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>state</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="state" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>phone_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone_2" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>mobile</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mobile" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>fax</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="fax" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>notes_from_shipper</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="notes_from_shipper" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>quote_origin_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_origin_zip" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_origin_city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_origin_city" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_origin_state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_origin_state" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>quote_destination_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_destination_zip" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_destination_city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_destination_city" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_destination_state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_destination_state" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<details>
<summary>
<b><code>quote_vehicles</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>
</summary>
<br>
<p>
<b><code>quote_vehicles[].year</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="quote_vehicles.0.year" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].make</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_vehicles.0.make" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].model</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_vehicles.0.model" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].vin</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="quote_vehicles.0.vin" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].is_running</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-shipper--shipper--quotes" hidden><input type="radio" name="quote_vehicles.0.is_running" value="true" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-shipper--shipper--quotes" hidden><input type="radio" name="quote_vehicles.0.is_running" value="false" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" ><code>false</code></label>
<br>
</p>
<p>
<b><code>quote_vehicles[].size</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_vehicles.0.size" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>8</code>, <code>7</code>, <code>9</code>, <code>10</code>, <code>11</code>, <code>12</code>, <code>13</code>, <code>14</code>, <code>15</code>, <code>16</code>, <code>17</code>, <code>18</code>, <code>19</code>, <code>20</code>, <code>21</code>, <code>22</code>, <code>23</code>, <code>24</code>, <code>25</code>, <code>26</code>, <code>27</code>, <code>28</code>, <code>29</code>, <code>30</code>, <code>31</code>, or <code>32</code>.</p>
<p>
<b><code>quote_vehicles[].price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="quote_vehicles.0.price" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
</details>
</p>
<p>
<b><code>carrier_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="carrier_type" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code> or <code>2</code>.</p>
<p>
<b><code>available_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="available_date" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
The value must be a valid date. The value must be a valid date in the format Y/m/d.</p>
<p>
<b><code>delivery_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="delivery_date" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
The value must be a valid date. The value must be a valid date in the format Y/m/d.</p>
<p>
<b><code>delivery_accuracy</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="delivery_accuracy" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, or <code>4</code>.</p>
<p>
<b><code>distance</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="distance" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="price" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>deposit</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="deposit" data-endpoint="POSTapi-shipper--shipper--quotes" data-component="body"  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/quotes/{quote}




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/aut/quotes/illum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"consequatur","quote_id":"quidem"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/aut/quotes/illum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "consequatur",
    "quote_id": "quidem"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper--shipper--quotes--quote-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--quotes--quote-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--quotes--quote-"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--quotes--quote-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--quotes--quote-"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--quotes--quote-" data-method="GET" data-path="api/shipper/{shipper}/quotes/{quote}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--quotes--quote-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--quotes--quote-" onclick="tryItOut('GETapi-shipper--shipper--quotes--quote-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--quotes--quote-" onclick="cancelTryOut('GETapi-shipper--shipper--quotes--quote-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--quotes--quote-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/quotes/{quote}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--quotes--quote-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>quote</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote" data-endpoint="GETapi-shipper--shipper--quotes--quote-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="GETapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_id" data-endpoint="GETapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/quotes/{quote}




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/ullam/quotes/laborum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"eum","quote_id":"animi","first_name":"et","last_name":"minima","phone":"blanditiis","email":"bergstrom.fritz@example.com","type":"1","company":"veritatis","address_1":"minima","address_2":"enim","zip":"et","city":"iste","state":"NJ","phone_2":"voluptatibus","mobile":"perferendis","fax":"esse","notes_from_shipper":"ratione","quote_origin_zip":"tempore","quote_origin_city":"atque","quote_origin_state":"FL","quote_destination_zip":"dolores","quote_destination_city":"dolores","quote_destination_state":"MT","quote_vehicles":[{"year":8,"make":"dolores","model":"aut","vin":"perferendis","is_running":false,"size":"2","price":10.213949099}],"carrier_type":"1","available_date":"2020\/11\/18","delivery_date":"2020\/11\/18","delivery_accuracy":"3","distance":4167.40048,"price":592090.7,"deposit":3418279.88392108,"status":8}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/ullam/quotes/laborum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "eum",
    "quote_id": "animi",
    "first_name": "et",
    "last_name": "minima",
    "phone": "blanditiis",
    "email": "bergstrom.fritz@example.com",
    "type": "1",
    "company": "veritatis",
    "address_1": "minima",
    "address_2": "enim",
    "zip": "et",
    "city": "iste",
    "state": "NJ",
    "phone_2": "voluptatibus",
    "mobile": "perferendis",
    "fax": "esse",
    "notes_from_shipper": "ratione",
    "quote_origin_zip": "tempore",
    "quote_origin_city": "atque",
    "quote_origin_state": "FL",
    "quote_destination_zip": "dolores",
    "quote_destination_city": "dolores",
    "quote_destination_state": "MT",
    "quote_vehicles": [
        {
            "year": 8,
            "make": "dolores",
            "model": "aut",
            "vin": "perferendis",
            "is_running": false,
            "size": "2",
            "price": 10.213949099
        }
    ],
    "carrier_type": "1",
    "available_date": "2020\/11\/18",
    "delivery_date": "2020\/11\/18",
    "delivery_accuracy": "3",
    "distance": 4167.40048,
    "price": 592090.7,
    "deposit": 3418279.88392108,
    "status": 8
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--quotes--quote-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--quotes--quote-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--quotes--quote-"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--quotes--quote-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--quotes--quote-"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--quotes--quote-" data-method="POST" data-path="api/shipper/{shipper}/quotes/{quote}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--quotes--quote-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--quotes--quote-" onclick="tryItOut('POSTapi-shipper--shipper--quotes--quote-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--quotes--quote-" onclick="cancelTryOut('POSTapi-shipper--shipper--quotes--quote-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--quotes--quote-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/quotes/{quote}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>quote</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_id" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>address_1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_1" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>address_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_2" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="zip" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="city" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>state</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="state" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>phone_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone_2" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>mobile</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mobile" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>fax</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="fax" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>notes_from_shipper</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="notes_from_shipper" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>quote_origin_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_origin_zip" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_origin_city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_origin_city" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_origin_state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_origin_state" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>quote_destination_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_destination_zip" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_destination_city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_destination_city" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_destination_state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_destination_state" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<details>
<summary>
<b><code>quote_vehicles</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>
</summary>
<br>
<p>
<b><code>quote_vehicles[].year</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="quote_vehicles.0.year" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].make</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_vehicles.0.make" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].model</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_vehicles.0.model" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].vin</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="quote_vehicles.0.vin" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>quote_vehicles[].is_running</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-shipper--shipper--quotes--quote-" hidden><input type="radio" name="quote_vehicles.0.is_running" value="true" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-shipper--shipper--quotes--quote-" hidden><input type="radio" name="quote_vehicles.0.is_running" value="false" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" ><code>false</code></label>
<br>
</p>
<p>
<b><code>quote_vehicles[].size</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_vehicles.0.size" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>8</code>, <code>7</code>, <code>9</code>, <code>10</code>, <code>11</code>, <code>12</code>, <code>13</code>, <code>14</code>, <code>15</code>, <code>16</code>, <code>17</code>, <code>18</code>, <code>19</code>, <code>20</code>, <code>21</code>, <code>22</code>, <code>23</code>, <code>24</code>, <code>25</code>, <code>26</code>, <code>27</code>, <code>28</code>, <code>29</code>, <code>30</code>, <code>31</code>, or <code>32</code>.</p>
<p>
<b><code>quote_vehicles[].price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="quote_vehicles.0.price" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
</details>
</p>
<p>
<b><code>carrier_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="carrier_type" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code> or <code>2</code>.</p>
<p>
<b><code>available_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="available_date" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be a valid date. The value must be a valid date in the format Y/m/d.</p>
<p>
<b><code>delivery_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="delivery_date" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be a valid date. The value must be a valid date in the format Y/m/d.</p>
<p>
<b><code>delivery_accuracy</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="delivery_accuracy" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, or <code>4</code>.</p>
<p>
<b><code>distance</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="distance" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="price" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>deposit</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="deposit" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>status</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="status" data-endpoint="POSTapi-shipper--shipper--quotes--quote-" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code>, <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>7</code>, <code>8</code>, or <code>9</code>.</p>

</form>


## api/shipper/{shipper}/quotes/{quote}/delete




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/et/quotes/eum/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"dolores","quote_id":"exercitationem"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/et/quotes/eum/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "dolores",
    "quote_id": "exercitationem"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--quotes--quote--delete" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--quotes--quote--delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--quotes--quote--delete"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--quotes--quote--delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--quotes--quote--delete"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--quotes--quote--delete" data-method="POST" data-path="api/shipper/{shipper}/quotes/{quote}/delete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--quotes--quote--delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--quotes--quote--delete" onclick="tryItOut('POSTapi-shipper--shipper--quotes--quote--delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--quotes--quote--delete" onclick="cancelTryOut('POSTapi-shipper--shipper--quotes--quote--delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--quotes--quote--delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/quotes/{quote}/delete</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--quotes--quote--delete" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>quote</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote" data-endpoint="POSTapi-shipper--shipper--quotes--quote--delete" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--quotes--quote--delete" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_id" data-endpoint="POSTapi-shipper--shipper--quotes--quote--delete" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/quotes/{quote}/email




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/sequi/quotes/voluptas/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"berge.tremayne@example.com","shipper_id":"ratione","quote_id":"harum"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/sequi/quotes/voluptas/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "berge.tremayne@example.com",
    "shipper_id": "ratione",
    "quote_id": "harum"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--quotes--quote--email" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--quotes--quote--email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--quotes--quote--email"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--quotes--quote--email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--quotes--quote--email"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--quotes--quote--email" data-method="POST" data-path="api/shipper/{shipper}/quotes/{quote}/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--quotes--quote--email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--quotes--quote--email" onclick="tryItOut('POSTapi-shipper--shipper--quotes--quote--email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--quotes--quote--email" onclick="cancelTryOut('POSTapi-shipper--shipper--quotes--quote--email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--quotes--quote--email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/quotes/{quote}/email</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--quotes--quote--email" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>quote</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote" data-endpoint="POSTapi-shipper--shipper--quotes--quote--email" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--quotes--quote--email" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--quotes--quote--email" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_id" data-endpoint="POSTapi-shipper--shipper--quotes--quote--email" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/quotes/{quote}/to-load




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/consequatur/quotes/asperiores/to-load" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"occaecati","quote_id":"architecto"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/consequatur/quotes/asperiores/to-load"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "occaecati",
    "quote_id": "architecto"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--quotes--quote--to-load" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--quotes--quote--to-load"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--quotes--quote--to-load"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--quotes--quote--to-load" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--quotes--quote--to-load"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--quotes--quote--to-load" data-method="POST" data-path="api/shipper/{shipper}/quotes/{quote}/to-load" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--quotes--quote--to-load', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--quotes--quote--to-load" onclick="tryItOut('POSTapi-shipper--shipper--quotes--quote--to-load');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--quotes--quote--to-load" onclick="cancelTryOut('POSTapi-shipper--shipper--quotes--quote--to-load');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--quotes--quote--to-load" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/quotes/{quote}/to-load</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--quotes--quote--to-load" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>quote</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote" data-endpoint="POSTapi-shipper--shipper--quotes--quote--to-load" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--quotes--quote--to-load" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>quote_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote_id" data-endpoint="POSTapi-shipper--shipper--quotes--quote--to-load" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/loads




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/expedita/loads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/expedita/loads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper--shipper--loads" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--loads"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--loads"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--loads" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--loads"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--loads" data-method="GET" data-path="api/shipper/{shipper}/loads" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--loads', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--loads" onclick="tryItOut('GETapi-shipper--shipper--loads');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--loads" onclick="cancelTryOut('GETapi-shipper--shipper--loads');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--loads" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/loads</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--loads" data-component="url" required  hidden>
<br>
</p>
</form>


## api/shipper/{shipper}/loads




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/veniam/loads" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "shipper_id=quam" \
    -F "client_id=ipsam" \
    -F "driver_id=est" \
    -F "custom_load_number=voluptatem" \
    -F "referrer=cupiditate" \
    -F "description=et" \
    -F "first_name=vel" \
    -F "last_name=quia" \
    -F "phone=occaecati" \
    -F "email=zstoltenberg@example.com" \
    -F "type=1" \
    -F "company=error" \
    -F "address_1=et" \
    -F "address_2=aliquid" \
    -F "zip=possimus" \
    -F "city=est" \
    -F "state=NC" \
    -F "phone_2=eveniet" \
    -F "mobile=qui" \
    -F "fax=sit" \
    -F "notes_from_shipper=aperiam" \
    -F "load_origin_name=totam" \
    -F "load_origin_company=minus" \
    -F "load_origin_type=1" \
    -F "load_origin_address_1=quia" \
    -F "load_origin_address_2=provident" \
    -F "load_origin_city=labore" \
    -F "load_origin_state=AL" \
    -F "load_origin_zip=modi" \
    -F "load_origin_phone=quas" \
    -F "load_origin_phone_2=ab" \
    -F "load_origin_mobile=velit" \
    -F "load_origin_email=coralie41@example.com" \
    -F "load_destination_name=nemo" \
    -F "load_destination_company=eveniet" \
    -F "load_destination_type=0" \
    -F "load_destination_address_1=est" \
    -F "load_destination_address_2=possimus" \
    -F "load_destination_city=quasi" \
    -F "load_destination_state=AS" \
    -F "load_destination_zip=delectus" \
    -F "load_destination_phone=nostrum" \
    -F "load_destination_phone_2=rem" \
    -F "load_destination_mobile=quis" \
    -F "load_destination_email=hyman93@example.org" \
    -F "load_vehicles[][year]=18" \
    -F "load_vehicles[][make]=molestiae" \
    -F "load_vehicles[][model]=cumque" \
    -F "load_vehicles[][vin]=dolorem" \
    -F "load_vehicles[][is_running]=" \
    -F "load_vehicles[][size]=8" \
    -F "load_vehicles[][price]=167582081.07403" \
    -F "load_vehicles[][state]=aut" \
    -F "load_vehicles[][color]=et" \
    -F "load_vehicles[][plate_number]=quas" \
    -F "load_vehicles[][lot_number]=ea" \
    -F "load_vehicles[][p_o_number]=minima" \
    -F "load_vehicles[][notes]=provident" \
    -F "carrier_type=1" \
    -F "available_date=2020/11/18" \
    -F "delivery_date=2020/11/18" \
    -F "delivery_accuracy=1" \
    -F "available_accuracy=1" \
    -F "distance=14189897.6502" \
    -F "price=419014.383547" \
    -F "deposit=17205.88" \
    -F "customer_pay_terms=1" \
    -F "carrier_pay_terms=5" \
    -F "carrier_pay=483736.89433" \
    -F "attachments[]=@/tmp/phpJytOow" 
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/veniam/loads"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('shipper_id', 'quam');
body.append('client_id', 'ipsam');
body.append('driver_id', 'est');
body.append('custom_load_number', 'voluptatem');
body.append('referrer', 'cupiditate');
body.append('description', 'et');
body.append('first_name', 'vel');
body.append('last_name', 'quia');
body.append('phone', 'occaecati');
body.append('email', 'zstoltenberg@example.com');
body.append('type', '1');
body.append('company', 'error');
body.append('address_1', 'et');
body.append('address_2', 'aliquid');
body.append('zip', 'possimus');
body.append('city', 'est');
body.append('state', 'NC');
body.append('phone_2', 'eveniet');
body.append('mobile', 'qui');
body.append('fax', 'sit');
body.append('notes_from_shipper', 'aperiam');
body.append('load_origin_name', 'totam');
body.append('load_origin_company', 'minus');
body.append('load_origin_type', '1');
body.append('load_origin_address_1', 'quia');
body.append('load_origin_address_2', 'provident');
body.append('load_origin_city', 'labore');
body.append('load_origin_state', 'AL');
body.append('load_origin_zip', 'modi');
body.append('load_origin_phone', 'quas');
body.append('load_origin_phone_2', 'ab');
body.append('load_origin_mobile', 'velit');
body.append('load_origin_email', 'coralie41@example.com');
body.append('load_destination_name', 'nemo');
body.append('load_destination_company', 'eveniet');
body.append('load_destination_type', '0');
body.append('load_destination_address_1', 'est');
body.append('load_destination_address_2', 'possimus');
body.append('load_destination_city', 'quasi');
body.append('load_destination_state', 'AS');
body.append('load_destination_zip', 'delectus');
body.append('load_destination_phone', 'nostrum');
body.append('load_destination_phone_2', 'rem');
body.append('load_destination_mobile', 'quis');
body.append('load_destination_email', 'hyman93@example.org');
body.append('load_vehicles[][year]', '18');
body.append('load_vehicles[][make]', 'molestiae');
body.append('load_vehicles[][model]', 'cumque');
body.append('load_vehicles[][vin]', 'dolorem');
body.append('load_vehicles[][is_running]', '');
body.append('load_vehicles[][size]', '8');
body.append('load_vehicles[][price]', '167582081.07403');
body.append('load_vehicles[][state]', 'aut');
body.append('load_vehicles[][color]', 'et');
body.append('load_vehicles[][plate_number]', 'quas');
body.append('load_vehicles[][lot_number]', 'ea');
body.append('load_vehicles[][p_o_number]', 'minima');
body.append('load_vehicles[][notes]', 'provident');
body.append('carrier_type', '1');
body.append('available_date', '2020/11/18');
body.append('delivery_date', '2020/11/18');
body.append('delivery_accuracy', '1');
body.append('available_accuracy', '1');
body.append('distance', '14189897.6502');
body.append('price', '419014.383547');
body.append('deposit', '17205.88');
body.append('customer_pay_terms', '1');
body.append('carrier_pay_terms', '5');
body.append('carrier_pay', '483736.89433');
body.append('attachments[]', document.querySelector('input[name="attachments[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--loads" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--loads"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--loads"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--loads" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--loads"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--loads" data-method="POST" data-path="api/shipper/{shipper}/loads" data-authed="0" data-hasfiles="1" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--loads', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--loads" onclick="tryItOut('POSTapi-shipper--shipper--loads');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--loads" onclick="cancelTryOut('POSTapi-shipper--shipper--loads');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--loads" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/loads</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--loads" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>client_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="client_id" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>driver_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="driver_id" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>custom_load_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="custom_load_number" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>referrer</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="referrer" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>attachments</code></b>&nbsp;&nbsp;<small>file[]</small>     <i>optional</i> &nbsp;
<input type="file" name="attachments.0" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<input type="file" name="attachments.1" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" hidden>
<br>
The value must be a file.</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="type" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>address_1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_1" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>address_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_2" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="zip" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="city" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>state</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="state" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>phone_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone_2" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>mobile</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mobile" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>fax</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="fax" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>notes_from_shipper</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="notes_from_shipper" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_name" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_company" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_type</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="load_origin_type" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>load_origin_address_1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_address_1" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_address_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_address_2" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_origin_city" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_origin_state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_origin_state" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>load_origin_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_origin_zip" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_origin_phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_phone" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_phone_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_phone_2" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_mobile</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_mobile" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_email" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>load_destination_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_name" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_company" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_type</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="load_destination_type" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>load_destination_address_1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_address_1" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_address_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_address_2" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_destination_city" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_destination_state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_destination_state" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>load_destination_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_destination_zip" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_destination_phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_phone" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_phone_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_phone_2" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_mobile</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_mobile" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_email" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
The value must be a valid email address.</p>
<p>
<details>
<summary>
<b><code>load_vehicles</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>
</summary>
<br>
<p>
<b><code>load_vehicles[].year</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="load_vehicles.0.year" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].make</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_vehicles.0.make" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].model</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_vehicles.0.model" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].vin</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.vin" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].is_running</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-shipper--shipper--loads" hidden><input type="radio" name="load_vehicles.0.is_running" value="true" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-shipper--shipper--loads" hidden><input type="radio" name="load_vehicles.0.is_running" value="false" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" ><code>false</code></label>
<br>
</p>
<p>
<b><code>load_vehicles[].size</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_vehicles.0.size" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>8</code>, <code>7</code>, <code>9</code>, <code>10</code>, <code>11</code>, <code>12</code>, <code>13</code>, <code>14</code>, <code>15</code>, <code>16</code>, <code>17</code>, <code>18</code>, <code>19</code>, <code>20</code>, <code>21</code>, <code>22</code>, <code>23</code>, <code>24</code>, <code>25</code>, <code>26</code>, <code>27</code>, <code>28</code>, <code>29</code>, <code>30</code>, <code>31</code>, or <code>32</code>.</p>
<p>
<b><code>load_vehicles[].price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="load_vehicles.0.price" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].state</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.state" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].color</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.color" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].plate_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.plate_number" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].lot_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.lot_number" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].p_o_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.p_o_number" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].notes</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.notes" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
</details>
</p>
<p>
<b><code>carrier_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="carrier_type" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code> or <code>2</code>.</p>
<p>
<b><code>available_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="available_date" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
The value must be a valid date. The value must be a valid date in the format Y/m/d.</p>
<p>
<b><code>delivery_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="delivery_date" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
The value must be a valid date. The value must be a valid date in the format Y/m/d.</p>
<p>
<b><code>delivery_accuracy</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="delivery_accuracy" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, or <code>4</code>.</p>
<p>
<b><code>available_accuracy</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="available_accuracy" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, or <code>4</code>.</p>
<p>
<b><code>distance</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="distance" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="price" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>deposit</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="deposit" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>customer_pay_terms</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="customer_pay_terms" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, or <code>5</code>.</p>
<p>
<b><code>carrier_pay_terms</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="carrier_pay_terms" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, or <code>6</code>.</p>
<p>
<b><code>carrier_pay</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="carrier_pay" data-endpoint="POSTapi-shipper--shipper--loads" data-component="body"  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/loads/{load}




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/est/loads/excepturi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"nesciunt","load_id":"adipisci"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/est/loads/excepturi"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "nesciunt",
    "load_id": "adipisci"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper--shipper--loads--load-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--loads--load-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--loads--load-"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--loads--load-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--loads--load-"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--loads--load-" data-method="GET" data-path="api/shipper/{shipper}/loads/{load}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--loads--load-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--loads--load-" onclick="tryItOut('GETapi-shipper--shipper--loads--load-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--loads--load-" onclick="cancelTryOut('GETapi-shipper--shipper--loads--load-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--loads--load-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/loads/{load}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--loads--load-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>load</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load" data-endpoint="GETapi-shipper--shipper--loads--load-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="GETapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_id" data-endpoint="GETapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/loads/{load}




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/nesciunt/loads/aut" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "status=1" \
    -F "shipper_id=cum" \
    -F "driver_id=temporibus" \
    -F "custom_load_number=ut" \
    -F "referrer=tenetur" \
    -F "description=dignissimos" \
    -F "first_name=eveniet" \
    -F "last_name=eaque" \
    -F "phone=aut" \
    -F "email=keeling.gideon@example.net" \
    -F "type=1" \
    -F "company=non" \
    -F "address_1=est" \
    -F "address_2=recusandae" \
    -F "zip=reiciendis" \
    -F "city=iste" \
    -F "state=CO" \
    -F "phone_2=nemo" \
    -F "mobile=dignissimos" \
    -F "fax=quisquam" \
    -F "notes_from_shipper=expedita" \
    -F "load_origin_name=et" \
    -F "load_origin_company=iusto" \
    -F "load_origin_type=1" \
    -F "load_origin_address_1=non" \
    -F "load_origin_address_2=nihil" \
    -F "load_origin_city=nulla" \
    -F "load_origin_state=WI" \
    -F "load_origin_zip=eos" \
    -F "load_origin_phone=modi" \
    -F "load_origin_phone_2=nemo" \
    -F "load_origin_mobile=est" \
    -F "load_origin_email=plarson@example.net" \
    -F "load_destination_name=aperiam" \
    -F "load_destination_company=non" \
    -F "load_destination_type=1" \
    -F "load_destination_address_1=deleniti" \
    -F "load_destination_address_2=repellendus" \
    -F "load_destination_city=nihil" \
    -F "load_destination_state=SC" \
    -F "load_destination_zip=tenetur" \
    -F "load_destination_phone=eius" \
    -F "load_destination_phone_2=iste" \
    -F "load_destination_mobile=quis" \
    -F "load_destination_email=wnolan@example.com" \
    -F "load_vehicles[][year]=13" \
    -F "load_vehicles[][make]=voluptatum" \
    -F "load_vehicles[][model]=hic" \
    -F "load_vehicles[][vin]=earum" \
    -F "load_vehicles[][is_running]=" \
    -F "load_vehicles[][size]=13" \
    -F "load_vehicles[][price]=689050782.42263" \
    -F "load_vehicles[][state]=quia" \
    -F "load_vehicles[][color]=cupiditate" \
    -F "load_vehicles[][plate_number]=sunt" \
    -F "load_vehicles[][lot_number]=consequuntur" \
    -F "load_vehicles[][p_o_number]=qui" \
    -F "load_vehicles[][notes]=eos" \
    -F "carrier_type=1" \
    -F "available_date=2020/11/18" \
    -F "delivery_date=2020/11/18" \
    -F "delivery_accuracy=3" \
    -F "distance=64.4" \
    -F "price=249.443577" \
    -F "deposit=12079.418535" \
    -F "customer_pay_terms=2" \
    -F "carrier_pay_terms=3" \
    -F "carrier_pay=4.42" \
    -F "attachments[]=@/tmp/phpjIJwL2" 
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/nesciunt/loads/aut"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('status', '1');
body.append('shipper_id', 'cum');
body.append('driver_id', 'temporibus');
body.append('custom_load_number', 'ut');
body.append('referrer', 'tenetur');
body.append('description', 'dignissimos');
body.append('first_name', 'eveniet');
body.append('last_name', 'eaque');
body.append('phone', 'aut');
body.append('email', 'keeling.gideon@example.net');
body.append('type', '1');
body.append('company', 'non');
body.append('address_1', 'est');
body.append('address_2', 'recusandae');
body.append('zip', 'reiciendis');
body.append('city', 'iste');
body.append('state', 'CO');
body.append('phone_2', 'nemo');
body.append('mobile', 'dignissimos');
body.append('fax', 'quisquam');
body.append('notes_from_shipper', 'expedita');
body.append('load_origin_name', 'et');
body.append('load_origin_company', 'iusto');
body.append('load_origin_type', '1');
body.append('load_origin_address_1', 'non');
body.append('load_origin_address_2', 'nihil');
body.append('load_origin_city', 'nulla');
body.append('load_origin_state', 'WI');
body.append('load_origin_zip', 'eos');
body.append('load_origin_phone', 'modi');
body.append('load_origin_phone_2', 'nemo');
body.append('load_origin_mobile', 'est');
body.append('load_origin_email', 'plarson@example.net');
body.append('load_destination_name', 'aperiam');
body.append('load_destination_company', 'non');
body.append('load_destination_type', '1');
body.append('load_destination_address_1', 'deleniti');
body.append('load_destination_address_2', 'repellendus');
body.append('load_destination_city', 'nihil');
body.append('load_destination_state', 'SC');
body.append('load_destination_zip', 'tenetur');
body.append('load_destination_phone', 'eius');
body.append('load_destination_phone_2', 'iste');
body.append('load_destination_mobile', 'quis');
body.append('load_destination_email', 'wnolan@example.com');
body.append('load_vehicles[][year]', '13');
body.append('load_vehicles[][make]', 'voluptatum');
body.append('load_vehicles[][model]', 'hic');
body.append('load_vehicles[][vin]', 'earum');
body.append('load_vehicles[][is_running]', '');
body.append('load_vehicles[][size]', '13');
body.append('load_vehicles[][price]', '689050782.42263');
body.append('load_vehicles[][state]', 'quia');
body.append('load_vehicles[][color]', 'cupiditate');
body.append('load_vehicles[][plate_number]', 'sunt');
body.append('load_vehicles[][lot_number]', 'consequuntur');
body.append('load_vehicles[][p_o_number]', 'qui');
body.append('load_vehicles[][notes]', 'eos');
body.append('carrier_type', '1');
body.append('available_date', '2020/11/18');
body.append('delivery_date', '2020/11/18');
body.append('delivery_accuracy', '3');
body.append('distance', '64.4');
body.append('price', '249.443577');
body.append('deposit', '12079.418535');
body.append('customer_pay_terms', '2');
body.append('carrier_pay_terms', '3');
body.append('carrier_pay', '4.42');
body.append('attachments[]', document.querySelector('input[name="attachments[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--loads--load-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--loads--load-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--loads--load-"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--loads--load-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--loads--load-"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--loads--load-" data-method="POST" data-path="api/shipper/{shipper}/loads/{load}" data-authed="0" data-hasfiles="1" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--loads--load-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--loads--load-" onclick="tryItOut('POSTapi-shipper--shipper--loads--load-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--loads--load-" onclick="cancelTryOut('POSTapi-shipper--shipper--loads--load-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--loads--load-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/loads/{load}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>load</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>status</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="status" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>driver_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="driver_id" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>custom_load_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="custom_load_number" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>referrer</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="referrer" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>attachments</code></b>&nbsp;&nbsp;<small>file[]</small>     <i>optional</i> &nbsp;
<input type="file" name="attachments.0" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<input type="file" name="attachments.1" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" hidden>
<br>
The value must be a file.</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="type" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>address_1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_1" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>address_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address_2" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="zip" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="city" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>state</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="state" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>phone_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone_2" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>mobile</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mobile" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>fax</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="fax" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>notes_from_shipper</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="notes_from_shipper" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_name" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_company" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_type</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="load_origin_type" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>load_origin_address_1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_address_1" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_address_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_address_2" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_origin_city" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_origin_state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_origin_state" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>load_origin_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_origin_zip" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_origin_phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_phone" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_phone_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_phone_2" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_mobile</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_mobile" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_origin_email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_origin_email" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>load_destination_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_name" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_company" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_type</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="load_destination_type" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
The value must be one of <code>0</code> or <code>1</code>.</p>
<p>
<b><code>load_destination_address_1</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_address_1" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_address_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_address_2" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_destination_city" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_destination_state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_destination_state" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
The value must be one of <code>AL</code>, <code>AK</code>, <code>AZ</code>, <code>AR</code>, <code>CA</code>, <code>CO</code>, <code>CT</code>, <code>DE</code>, <code>DC</code>, <code>FL</code>, <code>GA</code>, <code>HI</code>, <code>ID</code>, <code>IL</code>, <code>IN</code>, <code>IA</code>, <code>KS</code>, <code>KY</code>, <code>LA</code>, <code>ME</code>, <code>MD</code>, <code>MA</code>, <code>MI</code>, <code>MN</code>, <code>MS</code>, <code>MO</code>, <code>MT</code>, <code>NE</code>, <code>NV</code>, <code>NH</code>, <code>NJ</code>, <code>NM</code>, <code>NY</code>, <code>NC</code>, <code>ND</code>, <code>OH</code>, <code>OK</code>, <code>OR</code>, <code>PA</code>, <code>RI</code>, <code>SC</code>, <code>SD</code>, <code>TN</code>, <code>TX</code>, <code>UT</code>, <code>VT</code>, <code>VA</code>, <code>WA</code>, <code>WV</code>, <code>WI</code>, <code>WY</code>, <code>AA</code>, <code>AE</code>, <code>AP</code>, <code>AS</code>, <code>GU</code>, <code>MP</code>, <code>PR</code>, <code>VI</code>, <code>FM</code>, <code>MH</code>, or <code>PW</code>.</p>
<p>
<b><code>load_destination_zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_destination_zip" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_destination_phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_phone" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_phone_2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_phone_2" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_mobile</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_mobile" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_destination_email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_destination_email" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
The value must be a valid email address.</p>
<p>
<details>
<summary>
<b><code>load_vehicles</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>
</summary>
<br>
<p>
<b><code>load_vehicles[].year</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="load_vehicles.0.year" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].make</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_vehicles.0.make" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].model</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_vehicles.0.model" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].vin</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.vin" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].is_running</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-shipper--shipper--loads--load-" hidden><input type="radio" name="load_vehicles.0.is_running" value="true" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-shipper--shipper--loads--load-" hidden><input type="radio" name="load_vehicles.0.is_running" value="false" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" ><code>false</code></label>
<br>
</p>
<p>
<b><code>load_vehicles[].size</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_vehicles.0.size" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>8</code>, <code>7</code>, <code>9</code>, <code>10</code>, <code>11</code>, <code>12</code>, <code>13</code>, <code>14</code>, <code>15</code>, <code>16</code>, <code>17</code>, <code>18</code>, <code>19</code>, <code>20</code>, <code>21</code>, <code>22</code>, <code>23</code>, <code>24</code>, <code>25</code>, <code>26</code>, <code>27</code>, <code>28</code>, <code>29</code>, <code>30</code>, <code>31</code>, or <code>32</code>.</p>
<p>
<b><code>load_vehicles[].price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="load_vehicles.0.price" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].state</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.state" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].color</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.color" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].plate_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.plate_number" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].lot_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.lot_number" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].p_o_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.p_o_number" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>load_vehicles[].notes</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="load_vehicles.0.notes" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
</details>
</p>
<p>
<b><code>carrier_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="carrier_type" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code> or <code>2</code>.</p>
<p>
<b><code>available_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="available_date" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
The value must be a valid date. The value must be a valid date in the format Y/m/d.</p>
<p>
<b><code>delivery_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="delivery_date" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
The value must be a valid date. The value must be a valid date in the format Y/m/d.</p>
<p>
<b><code>delivery_accuracy</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="delivery_accuracy" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, or <code>4</code>.</p>
<p>
<b><code>distance</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="distance" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="price" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>deposit</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="deposit" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>customer_pay_terms</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="customer_pay_terms" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, or <code>5</code>.</p>
<p>
<b><code>carrier_pay_terms</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="carrier_pay_terms" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
The value must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, or <code>6</code>.</p>
<p>
<b><code>carrier_pay</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="carrier_pay" data-endpoint="POSTapi-shipper--shipper--loads--load-" data-component="body"  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/loads/{load}/delete




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/fuga/loads/quas/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"eum","load_id":"perferendis"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/fuga/loads/quas/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "eum",
    "load_id": "perferendis"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--loads--load--delete" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--loads--load--delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--loads--load--delete"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--loads--load--delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--loads--load--delete"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--loads--load--delete" data-method="POST" data-path="api/shipper/{shipper}/loads/{load}/delete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--loads--load--delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--loads--load--delete" onclick="tryItOut('POSTapi-shipper--shipper--loads--load--delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--loads--load--delete" onclick="cancelTryOut('POSTapi-shipper--shipper--loads--load--delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--loads--load--delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/loads/{load}/delete</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--loads--load--delete" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>load</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load" data-endpoint="POSTapi-shipper--shipper--loads--load--delete" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--loads--load--delete" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_id" data-endpoint="POSTapi-shipper--shipper--loads--load--delete" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/loads/{load}/email




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/nostrum/loads/quo/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"eos","load_id":"consequatur"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/nostrum/loads/quo/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "eos",
    "load_id": "consequatur"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--loads--load--email" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--loads--load--email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--loads--load--email"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--loads--load--email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--loads--load--email"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--loads--load--email" data-method="POST" data-path="api/shipper/{shipper}/loads/{load}/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--loads--load--email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--loads--load--email" onclick="tryItOut('POSTapi-shipper--shipper--loads--load--email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--loads--load--email" onclick="cancelTryOut('POSTapi-shipper--shipper--loads--load--email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--loads--load--email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/loads/{load}/email</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--loads--load--email" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>load</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load" data-endpoint="POSTapi-shipper--shipper--loads--load--email" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--loads--load--email" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>load_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="load_id" data-endpoint="POSTapi-shipper--shipper--loads--load--email" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/email-templates




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/consequatur/email-templates" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"non"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/consequatur/email-templates"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "non"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper--shipper--email-templates" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--email-templates"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--email-templates"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--email-templates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--email-templates"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--email-templates" data-method="GET" data-path="api/shipper/{shipper}/email-templates" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--email-templates', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--email-templates" onclick="tryItOut('GETapi-shipper--shipper--email-templates');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--email-templates" onclick="cancelTryOut('GETapi-shipper--shipper--email-templates');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--email-templates" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/email-templates</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--email-templates" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="GETapi-shipper--shipper--email-templates" data-component="body" required  hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/email-templates/variables




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/quos/email-templates/variables" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/quos/email-templates/variables"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper--shipper--email-templates-variables" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--email-templates-variables"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--email-templates-variables"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--email-templates-variables" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--email-templates-variables"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--email-templates-variables" data-method="GET" data-path="api/shipper/{shipper}/email-templates/variables" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--email-templates-variables', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--email-templates-variables" onclick="tryItOut('GETapi-shipper--shipper--email-templates-variables');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--email-templates-variables" onclick="cancelTryOut('GETapi-shipper--shipper--email-templates-variables');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--email-templates-variables" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/email-templates/variables</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--email-templates-variables" data-component="url" required  hidden>
<br>
</p>
</form>


## api/shipper/{shipper}/email-templates




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/delectus/email-templates" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"est","html_template":"rerum","id":"iusto","name":"qui","subject":"recusandae","type":"order"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/delectus/email-templates"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "est",
    "html_template": "rerum",
    "id": "iusto",
    "name": "qui",
    "subject": "recusandae",
    "type": "order"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--email-templates" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--email-templates"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--email-templates"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--email-templates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--email-templates"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--email-templates" data-method="POST" data-path="api/shipper/{shipper}/email-templates" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--email-templates', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--email-templates" onclick="tryItOut('POSTapi-shipper--shipper--email-templates');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--email-templates" onclick="cancelTryOut('POSTapi-shipper--shipper--email-templates');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--email-templates" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/email-templates</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--email-templates" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--email-templates" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>html_template</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="html_template" data-endpoint="POSTapi-shipper--shipper--email-templates" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-shipper--shipper--email-templates" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-shipper--shipper--email-templates" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>subject</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="subject" data-endpoint="POSTapi-shipper--shipper--email-templates" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-shipper--shipper--email-templates" data-component="body" required  hidden>
<br>
The value must be one of <code>quote</code>, <code>credentials</code>, <code>order</code>, <code>quote-draft</code>, <code>email-verification</code>, <code>email-change-verification</code>, or <code>sms</code>.</p>

</form>


## api/shipper/{shipper}/email-templates/active




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/architecto/email-templates/active" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"asperiores","html_template":"consequatur","id":"hic","name":"dicta","subject":"similique","type":"email-change-verification"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/architecto/email-templates/active"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "asperiores",
    "html_template": "consequatur",
    "id": "hic",
    "name": "dicta",
    "subject": "similique",
    "type": "email-change-verification"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--email-templates-active" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--email-templates-active"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--email-templates-active"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--email-templates-active" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--email-templates-active"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--email-templates-active" data-method="POST" data-path="api/shipper/{shipper}/email-templates/active" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--email-templates-active', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--email-templates-active" onclick="tryItOut('POSTapi-shipper--shipper--email-templates-active');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--email-templates-active" onclick="cancelTryOut('POSTapi-shipper--shipper--email-templates-active');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--email-templates-active" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/email-templates/active</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--email-templates-active" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--email-templates-active" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>html_template</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="html_template" data-endpoint="POSTapi-shipper--shipper--email-templates-active" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-shipper--shipper--email-templates-active" data-component="body"  hidden>
<br>
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-shipper--shipper--email-templates-active" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>subject</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="subject" data-endpoint="POSTapi-shipper--shipper--email-templates-active" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-shipper--shipper--email-templates-active" data-component="body" required  hidden>
<br>
The value must be one of <code>quote</code>, <code>credentials</code>, <code>order</code>, <code>quote-draft</code>, <code>email-verification</code>, <code>email-change-verification</code>, or <code>sms</code>.</p>

</form>


## api/shipper/{shipper}/email-templates/delete




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/minima/email-templates/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"shipper_id":"est","templates":["impedit","inventore"]}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/minima/email-templates/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipper_id": "est",
    "templates": [
        "impedit",
        "inventore"
    ]
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--email-templates-delete" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--email-templates-delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--email-templates-delete"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--email-templates-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--email-templates-delete"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--email-templates-delete" data-method="POST" data-path="api/shipper/{shipper}/email-templates/delete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--email-templates-delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--email-templates-delete" onclick="tryItOut('POSTapi-shipper--shipper--email-templates-delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--email-templates-delete" onclick="cancelTryOut('POSTapi-shipper--shipper--email-templates-delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--email-templates-delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/email-templates/delete</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--email-templates-delete" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>shipper_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper_id" data-endpoint="POSTapi-shipper--shipper--email-templates-delete" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>templates</code></b>&nbsp;&nbsp;<small>string[]</small>  &nbsp;
<input type="text" name="templates.0" data-endpoint="POSTapi-shipper--shipper--email-templates-delete" data-component="body" required  hidden>
<input type="text" name="templates.1" data-endpoint="POSTapi-shipper--shipper--email-templates-delete" data-component="body" hidden>
<br>
</p>

</form>


## api/shipper/{shipper}/settings




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/illo/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/illo/settings"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper--shipper--settings" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--settings"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--settings"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--settings"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--settings" data-method="GET" data-path="api/shipper/{shipper}/settings" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--settings', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--settings" onclick="tryItOut('GETapi-shipper--shipper--settings');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--settings" onclick="cancelTryOut('GETapi-shipper--shipper--settings');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--settings" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/settings</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--settings" data-component="url" required  hidden>
<br>
</p>
</form>


## api/shipper/{shipper}/settings/{settingKey}




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/aut/settings/autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/aut/settings/autem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper--shipper--settings--settingKey-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper--shipper--settings--settingKey-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper--shipper--settings--settingKey-"></code></pre>
</div>
<div id="execution-error-GETapi-shipper--shipper--settings--settingKey-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper--shipper--settings--settingKey-"></code></pre>
</div>
<form id="form-GETapi-shipper--shipper--settings--settingKey-" data-method="GET" data-path="api/shipper/{shipper}/settings/{settingKey}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper--shipper--settings--settingKey-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper--shipper--settings--settingKey-" onclick="tryItOut('GETapi-shipper--shipper--settings--settingKey-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper--shipper--settings--settingKey-" onclick="cancelTryOut('GETapi-shipper--shipper--settings--settingKey-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper--shipper--settings--settingKey-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/{shipper}/settings/{settingKey}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="GETapi-shipper--shipper--settings--settingKey-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>settingKey</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="settingKey" data-endpoint="GETapi-shipper--shipper--settings--settingKey-" data-component="url" required  hidden>
<br>
</p>
</form>


## api/shipper/{shipper}/settings/logo




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/api/shipper/dolorum/settings/logo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/dolorum/settings/logo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-shipper--shipper--settings-logo" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipper--shipper--settings-logo"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipper--shipper--settings-logo"></code></pre>
</div>
<div id="execution-error-POSTapi-shipper--shipper--settings-logo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipper--shipper--settings-logo"></code></pre>
</div>
<form id="form-POSTapi-shipper--shipper--settings-logo" data-method="POST" data-path="api/shipper/{shipper}/settings/logo" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipper--shipper--settings-logo', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipper--shipper--settings-logo" onclick="tryItOut('POSTapi-shipper--shipper--settings-logo');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipper--shipper--settings-logo" onclick="cancelTryOut('POSTapi-shipper--shipper--settings-logo');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipper--shipper--settings-logo" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipper/{shipper}/settings/logo</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipper</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipper" data-endpoint="POSTapi-shipper--shipper--settings-logo" data-component="url" required  hidden>
<br>
</p>
</form>


## api/shipper/roles




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper-roles" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper-roles"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper-roles"></code></pre>
</div>
<div id="execution-error-GETapi-shipper-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper-roles"></code></pre>
</div>
<form id="form-GETapi-shipper-roles" data-method="GET" data-path="api/shipper/roles" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper-roles', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper-roles" onclick="tryItOut('GETapi-shipper-roles');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper-roles" onclick="cancelTryOut('GETapi-shipper-roles');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper-roles" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/roles</code></b>
</p>
</form>


## api/shipper/subordinate-roles




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/subordinate-roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/subordinate-roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper-subordinate-roles" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper-subordinate-roles"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper-subordinate-roles"></code></pre>
</div>
<div id="execution-error-GETapi-shipper-subordinate-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper-subordinate-roles"></code></pre>
</div>
<form id="form-GETapi-shipper-subordinate-roles" data-method="GET" data-path="api/shipper/subordinate-roles" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper-subordinate-roles', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper-subordinate-roles" onclick="tryItOut('GETapi-shipper-subordinate-roles');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper-subordinate-roles" onclick="cancelTryOut('GETapi-shipper-subordinate-roles');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper-subordinate-roles" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/subordinate-roles</code></b>
</p>
</form>


## api/shipper/roles-to-create




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/shipper/roles-to-create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/shipper/roles-to-create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-shipper-roles-to-create" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shipper-roles-to-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shipper-roles-to-create"></code></pre>
</div>
<div id="execution-error-GETapi-shipper-roles-to-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shipper-roles-to-create"></code></pre>
</div>
<form id="form-GETapi-shipper-roles-to-create" data-method="GET" data-path="api/shipper/roles-to-create" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shipper-roles-to-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shipper-roles-to-create" onclick="tryItOut('GETapi-shipper-roles-to-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shipper-roles-to-create" onclick="cancelTryOut('GETapi-shipper-roles-to-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shipper-roles-to-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shipper/roles-to-create</code></b>
</p>
</form>


## api/widgets/settings




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/widgets/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/widgets/settings"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-widgets-settings" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-widgets-settings"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-widgets-settings"></code></pre>
</div>
<div id="execution-error-GETapi-widgets-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-widgets-settings"></code></pre>
</div>
<form id="form-GETapi-widgets-settings" data-method="GET" data-path="api/widgets/settings" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-widgets-settings', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-widgets-settings" onclick="tryItOut('GETapi-widgets-settings');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-widgets-settings" onclick="cancelTryOut('GETapi-widgets-settings');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-widgets-settings" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/widgets/settings</code></b>
</p>
</form>


## api/auth




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/api/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/api/auth"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


<div id="execution-results-GETapi-auth" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-auth"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth"></code></pre>
</div>
<div id="execution-error-GETapi-auth" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth"></code></pre>
</div>
<form id="form-GETapi-auth" data-method="GET" data-path="api/auth" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-auth', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-auth" onclick="tryItOut('GETapi-auth');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-auth" onclick="cancelTryOut('GETapi-auth');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-auth" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/auth</code></b>
</p>
</form>


## /




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html>
<head>
    <title>ExampleSaasApp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="qxsmEcOpasv2Dgm2rVv6FOLnL2BOavnA5F0zcJX6">
    <link rel="shortcut icon" href="http://dev.mydemosaasapp.com/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


<!-- common css -->
    <link href="http://dev.mydemosaasapp.com/css/app.css" rel="stylesheet" />
    <!-- end common css -->

    </head>
<body data-base-url="http://dev.mydemosaasapp.com">




    <div id="app">
        <App></App>
    </div>

<!-- base js -->
<script src="http://dev.mydemosaasapp.com/js/app.js"></script>
<!-- end base js -->

<!-- plugin js -->
<!-- end plugin js -->

</body>
</html>

```
<div id="execution-results-GET-" hidden>
    <blockquote>Received response<span id="execution-response-status-GET-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GET-"></code></pre>
</div>
<div id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-"></code></pre>
</div>
<form id="form-GET-" data-method="GET" data-path="/" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GET-" onclick="tryItOut('GET-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GET-" onclick="cancelTryOut('GET-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GET-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>/</code></b>
</p>
</form>


## email/verify/{id}/{hash}




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/email/verify/et/eius" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/email/verify/et/eius"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (403):

```json
{
    "message": "This action is unauthorized.",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\AccessDeniedHttpException",
    "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
    "line": 366,
    "trace": [
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Exceptions\/Handler.php",
            "line": 313,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/nunomaduro\/collision\/src\/Adapters\/Laravel\/ExceptionHandler.php",
            "line": 54,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "NunoMaduro\\Collision\\Adapters\\Laravel\\ExceptionHandler",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 130,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 77,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 693,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 668,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 634,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 623,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 87,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 118,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "call_user_func_array"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 95,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 39,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 596,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 258,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 920,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 266,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 142,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETemail-verify--id---hash-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETemail-verify--id---hash-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETemail-verify--id---hash-"></code></pre>
</div>
<div id="execution-error-GETemail-verify--id---hash-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETemail-verify--id---hash-"></code></pre>
</div>
<form id="form-GETemail-verify--id---hash-" data-method="GET" data-path="email/verify/{id}/{hash}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETemail-verify--id---hash-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETemail-verify--id---hash-" onclick="tryItOut('GETemail-verify--id---hash-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETemail-verify--id---hash-" onclick="cancelTryOut('GETemail-verify--id---hash-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETemail-verify--id---hash-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>email/verify/{id}/{hash}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETemail-verify--id---hash-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>hash</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hash" data-endpoint="GETemail-verify--id---hash-" data-component="url" required  hidden>
<br>
</p>
</form>


## quote/client-convert-to-load/{quote}/{hash}




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/quote/client-convert-to-load/vel/nostrum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/quote/client-convert-to-load/vel/nostrum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (500):

```json
{
    "message": "Argument 1 passed to App\\Service\\QuoteManagementService::convertQuoteToLoad() must be an instance of App\\Models\\Quote, null given, called in \/app\/app\/Http\/Controllers\/Api\/QuoteController.php on line 214",
    "exception": "TypeError",
    "file": "\/app\/app\/Service\/QuoteManagementService.php",
    "line": 270,
    "trace": [
        {
            "file": "\/app\/app\/Http\/Controllers\/Api\/QuoteController.php",
            "line": 214,
            "function": "convertQuoteToLoad",
            "class": "App\\Service\\QuoteManagementService",
            "type": "->"
        },
        {
            "function": "clientConvertQuoteToLoad",
            "class": "App\\Http\\Controllers\\Api\\QuoteController",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php",
            "line": 54,
            "function": "call_user_func_array"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 255,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 197,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 691,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 77,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 693,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 668,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 634,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 623,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 87,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 118,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "call_user_func_array"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 95,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 39,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 596,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 258,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 920,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 266,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 142,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETquote-client-convert-to-load--quote---hash-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETquote-client-convert-to-load--quote---hash-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETquote-client-convert-to-load--quote---hash-"></code></pre>
</div>
<div id="execution-error-GETquote-client-convert-to-load--quote---hash-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETquote-client-convert-to-load--quote---hash-"></code></pre>
</div>
<form id="form-GETquote-client-convert-to-load--quote---hash-" data-method="GET" data-path="quote/client-convert-to-load/{quote}/{hash}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETquote-client-convert-to-load--quote---hash-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETquote-client-convert-to-load--quote---hash-" onclick="tryItOut('GETquote-client-convert-to-load--quote---hash-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETquote-client-convert-to-load--quote---hash-" onclick="cancelTryOut('GETquote-client-convert-to-load--quote---hash-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETquote-client-convert-to-load--quote---hash-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>quote/client-convert-to-load/{quote}/{hash}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>quote</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="quote" data-endpoint="GETquote-client-convert-to-load--quote---hash-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>hash</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hash" data-endpoint="GETquote-client-convert-to-load--quote---hash-" data-component="url" required  hidden>
<br>
</p>
</form>


## email/verification-notification




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/email/verification-notification" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/email/verification-notification"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTemail-verification-notification" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTemail-verification-notification"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTemail-verification-notification"></code></pre>
</div>
<div id="execution-error-POSTemail-verification-notification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTemail-verification-notification"></code></pre>
</div>
<form id="form-POSTemail-verification-notification" data-method="POST" data-path="email/verification-notification" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTemail-verification-notification', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTemail-verification-notification" onclick="tryItOut('POSTemail-verification-notification');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTemail-verification-notification" onclick="cancelTryOut('POSTemail-verification-notification');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTemail-verification-notification" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>email/verification-notification</code></b>
</p>
</form>


## {user}/new-email-verification/{email}




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/repellat/new-email-verification/laborum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"in","email":"rory.leuschke@example.org"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/repellat/new-email-verification/laborum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "in",
    "email": "rory.leuschke@example.org"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (403):

```json
{
    "message": "Invalid signature.",
    "exception": "Illuminate\\Routing\\Exceptions\\InvalidSignatureException",
    "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ValidateSignature.php",
    "line": 26,
    "trace": [
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ValidateSignature",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php",
            "line": 77,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 693,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 668,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 634,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 623,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 87,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 118,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "call_user_func_array"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 95,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 39,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 596,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 258,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 920,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 266,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/symfony\/console\/Application.php",
            "line": 142,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "\/app\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GET-user--new-email-verification--email-" hidden>
    <blockquote>Received response<span id="execution-response-status-GET-user--new-email-verification--email-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GET-user--new-email-verification--email-"></code></pre>
</div>
<div id="execution-error-GET-user--new-email-verification--email-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-user--new-email-verification--email-"></code></pre>
</div>
<form id="form-GET-user--new-email-verification--email-" data-method="GET" data-path="{user}/new-email-verification/{email}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GET-user--new-email-verification--email-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GET-user--new-email-verification--email-" onclick="tryItOut('GET-user--new-email-verification--email-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GET-user--new-email-verification--email-" onclick="cancelTryOut('GET-user--new-email-verification--email-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GET-user--new-email-verification--email-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>{user}/new-email-verification/{email}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GET-user--new-email-verification--email-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="GET-user--new-email-verification--email-" data-component="url" required  hidden>
<br>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user_id" data-endpoint="GET-user--new-email-verification--email-" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="GET-user--new-email-verification--email-" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>

</form>


## external/{any}




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/external/libero" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/external/libero"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html>
<head>
    <title>ExampleSaasApp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="qxsmEcOpasv2Dgm2rVv6FOLnL2BOavnA5F0zcJX6">
    <link rel="shortcut icon" href="http://dev.mydemosaasapp.com/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


<!-- common css -->
    <link href="http://dev.mydemosaasapp.com/css/app.css" rel="stylesheet" />
    <!-- end common css -->

    </head>
<body data-base-url="http://dev.mydemosaasapp.com">




    <div id="app">
        <App :external="true"></App>
    </div>

<!-- base js -->
<script src="http://dev.mydemosaasapp.com/js/app.js"></script>
<!-- end base js -->

<!-- plugin js -->
<!-- end plugin js -->

</body>
</html>

```
<div id="execution-results-GETexternal--any-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETexternal--any-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETexternal--any-"></code></pre>
</div>
<div id="execution-error-GETexternal--any-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETexternal--any-"></code></pre>
</div>
<form id="form-GETexternal--any-" data-method="GET" data-path="external/{any}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETexternal--any-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETexternal--any-" onclick="tryItOut('GETexternal--any-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETexternal--any-" onclick="cancelTryOut('GETexternal--any-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETexternal--any-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>external/{any}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>any</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="any" data-endpoint="GETexternal--any-" data-component="url" required  hidden>
<br>
</p>
</form>


## {any}




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/perspiciatis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/perspiciatis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html>
<head>
    <title>ExampleSaasApp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="qxsmEcOpasv2Dgm2rVv6FOLnL2BOavnA5F0zcJX6">
    <link rel="shortcut icon" href="http://dev.mydemosaasapp.com/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


<!-- common css -->
    <link href="http://dev.mydemosaasapp.com/css/app.css" rel="stylesheet" />
    <!-- end common css -->

    </head>
<body data-base-url="http://dev.mydemosaasapp.com">




    <div id="app">
        <App></App>
    </div>

<!-- base js -->
<script src="http://dev.mydemosaasapp.com/js/app.js"></script>
<!-- end base js -->

<!-- plugin js -->
<!-- end plugin js -->

</body>
</html>

```
<div id="execution-results-GET-any-" hidden>
    <blockquote>Received response<span id="execution-response-status-GET-any-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GET-any-"></code></pre>
</div>
<div id="execution-error-GET-any-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-any-"></code></pre>
</div>
<form id="form-GET-any-" data-method="GET" data-path="{any}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GET-any-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GET-any-" onclick="tryItOut('GET-any-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GET-any-" onclick="cancelTryOut('GET-any-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GET-any-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>{any}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>any</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="any" data-endpoint="GET-any-" data-component="url" required  hidden>
<br>
</p>
</form>


## Show the application&#039;s login form.




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html>
<head>
    <title>ExampleSaasApp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="qxsmEcOpasv2Dgm2rVv6FOLnL2BOavnA5F0zcJX6">
    <link rel="shortcut icon" href="http://dev.mydemosaasapp.com/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


<!-- common css -->
    <link href="http://dev.mydemosaasapp.com/css/app.css" rel="stylesheet" />
    <!-- end common css -->

    </head>
<body data-base-url="http://dev.mydemosaasapp.com">




    <div id="app">
        <App></App>
    </div>

<!-- base js -->
<script src="http://dev.mydemosaasapp.com/js/app.js"></script>
<!-- end base js -->

<!-- plugin js -->
<!-- end plugin js -->

</body>
</html>

```
<div id="execution-results-GETlogin" hidden>
    <blockquote>Received response<span id="execution-response-status-GETlogin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETlogin"></code></pre>
</div>
<div id="execution-error-GETlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogin"></code></pre>
</div>
<form id="form-GETlogin" data-method="GET" data-path="login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETlogin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETlogin" onclick="tryItOut('GETlogin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETlogin" onclick="cancelTryOut('GETlogin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETlogin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>login</code></b>
</p>
</form>


## Handle a login request to the application.




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTlogin" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTlogin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogin"></code></pre>
</div>
<div id="execution-error-POSTlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogin"></code></pre>
</div>
<form id="form-POSTlogin" data-method="POST" data-path="login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTlogin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTlogin" onclick="tryItOut('POSTlogin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTlogin" onclick="cancelTryOut('POSTlogin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTlogin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>login</code></b>
</p>
</form>


## Log the user out of the application.




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTlogout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTlogout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogout"></code></pre>
</div>
<div id="execution-error-POSTlogout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogout"></code></pre>
</div>
<form id="form-POSTlogout" data-method="POST" data-path="logout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTlogout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTlogout" onclick="tryItOut('POSTlogout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTlogout" onclick="cancelTryOut('POSTlogout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTlogout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>logout</code></b>
</p>
</form>


## Show the application registration form.




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html>
<head>
    <title>ExampleSaasApp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="qxsmEcOpasv2Dgm2rVv6FOLnL2BOavnA5F0zcJX6">
    <link rel="shortcut icon" href="http://dev.mydemosaasapp.com/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


<!-- common css -->
    <link href="http://dev.mydemosaasapp.com/css/app.css" rel="stylesheet" />
    <!-- end common css -->

    </head>
<body data-base-url="http://dev.mydemosaasapp.com">




    <div id="app">
        <App></App>
    </div>

<!-- base js -->
<script src="http://dev.mydemosaasapp.com/js/app.js"></script>
<!-- end base js -->

<!-- plugin js -->
<!-- end plugin js -->

</body>
</html>

```
<div id="execution-results-GETregister" hidden>
    <blockquote>Received response<span id="execution-response-status-GETregister"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETregister"></code></pre>
</div>
<div id="execution-error-GETregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETregister"></code></pre>
</div>
<form id="form-GETregister" data-method="GET" data-path="register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETregister', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETregister" onclick="tryItOut('GETregister');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETregister" onclick="cancelTryOut('GETregister');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETregister" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>register</code></b>
</p>
</form>


## Handle a registration request for the application.




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"dolorem","last_name":"recusandae","email":"minerva.erdman@example.com","password":"voluptatum","address":"repellendus","business_name":"qui","phone":"eos","city":"ut","state":"Washington","zip":"nesciunt"}'

```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "dolorem",
    "last_name": "recusandae",
    "email": "minerva.erdman@example.com",
    "password": "voluptatum",
    "address": "repellendus",
    "business_name": "qui",
    "phone": "eos",
    "city": "ut",
    "state": "Washington",
    "zip": "nesciunt"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTregister" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTregister"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTregister"></code></pre>
</div>
<div id="execution-error-POSTregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTregister"></code></pre>
</div>
<form id="form-POSTregister" data-method="POST" data-path="register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTregister', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTregister" onclick="tryItOut('POSTregister');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTregister" onclick="cancelTryOut('POSTregister');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTregister" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTregister" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTregister" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTregister" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTregister" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="address" data-endpoint="POSTregister" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>business_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="business_name" data-endpoint="POSTregister" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTregister" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>city</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="city" data-endpoint="POSTregister" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>state</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="state" data-endpoint="POSTregister" data-component="body" required  hidden>
<br>
The value must be one of <code>Alabama</code>, <code>Alaska</code>, <code>Arizona</code>, <code>Arkansas</code>, <code>California</code>, <code>Colorado</code>, <code>Connecticut</code>, <code>Delaware</code>, <code>D.C. Columbia</code>, <code>Florida</code>, <code>Georgia</code>, <code>Hawaii</code>, <code>Idaho</code>, <code>Illinois</code>, <code>Indiana</code>, <code>Iowa</code>, <code>Kansas</code>, <code>Kentucky</code>, <code>Louisiana</code>, <code>Maine</code>, <code>Maryland</code>, <code>Massachusetts</code>, <code>Michigan</code>, <code>Minnesota</code>, <code>Mississippi</code>, <code>Missouri</code>, <code>Montana</code>, <code>Nebraska</code>, <code>Nevada</code>, <code>New Hampshire</code>, <code>New Jersey</code>, <code>New Mexico</code>, <code>New York</code>, <code>North Carolina</code>, <code>North Dakota</code>, <code>Ohio</code>, <code>Oklahoma</code>, <code>Oregon</code>, <code>Pennsylvania</code>, <code>Rhode Island</code>, <code>South Carolina</code>, <code>South Dakota</code>, <code>Tennessee</code>, <code>Texas</code>, <code>Utah</code>, <code>Vermont</code>, <code>Virginia</code>, <code>Washington</code>, <code>West Virginia</code>, <code>Wisconsin</code>, <code>Wyoming</code>, <code>Armed Forces America</code>, <code>Armed Forces Europe</code>, <code>Armed Forces Pacific</code>, <code>American Samoa</code>, <code>Guam</code>, <code>Northern Mariana Islands</code>, <code>Puerto Rico</code>, <code>Virgin Islands</code>, <code>Micronesia</code>, <code>Marshall Islands</code>, or <code>Palau</code>.</p>
<p>
<b><code>zip</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="zip" data-endpoint="POSTregister" data-component="body" required  hidden>
<br>
</p>

</form>


## Display the form to request a password reset link.




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html>
<head>
    <title>ExampleSaasApp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="qxsmEcOpasv2Dgm2rVv6FOLnL2BOavnA5F0zcJX6">
    <link rel="shortcut icon" href="http://dev.mydemosaasapp.com/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


<!-- common css -->
    <link href="http://dev.mydemosaasapp.com/css/app.css" rel="stylesheet" />
    <!-- end common css -->

    </head>
<body data-base-url="http://dev.mydemosaasapp.com">




    <div id="app">
        <App></App>
    </div>

<!-- base js -->
<script src="http://dev.mydemosaasapp.com/js/app.js"></script>
<!-- end base js -->

<!-- plugin js -->
<!-- end plugin js -->

</body>
</html>

```
<div id="execution-results-GETpassword-reset" hidden>
    <blockquote>Received response<span id="execution-response-status-GETpassword-reset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-reset"></code></pre>
</div>
<div id="execution-error-GETpassword-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-reset"></code></pre>
</div>
<form id="form-GETpassword-reset" data-method="GET" data-path="password/reset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETpassword-reset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETpassword-reset" onclick="tryItOut('GETpassword-reset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETpassword-reset" onclick="cancelTryOut('GETpassword-reset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETpassword-reset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>password/reset</code></b>
</p>
</form>


## Send a reset link to the given user.




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTpassword-email" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTpassword-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-email"></code></pre>
</div>
<div id="execution-error-POSTpassword-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-email"></code></pre>
</div>
<form id="form-POSTpassword-email" data-method="POST" data-path="password/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTpassword-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTpassword-email" onclick="tryItOut('POSTpassword-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTpassword-email" onclick="cancelTryOut('POSTpassword-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTpassword-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>password/email</code></b>
</p>
</form>


## Display the password reset view for the given token.


If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/password/reset/sint" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/password/reset/sint"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html>
<head>
    <title>ExampleSaasApp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="qxsmEcOpasv2Dgm2rVv6FOLnL2BOavnA5F0zcJX6">
    <link rel="shortcut icon" href="http://dev.mydemosaasapp.com/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


<!-- common css -->
    <link href="http://dev.mydemosaasapp.com/css/app.css" rel="stylesheet" />
    <!-- end common css -->

    </head>
<body data-base-url="http://dev.mydemosaasapp.com">




    <div id="app">
        <App></App>
    </div>

<!-- base js -->
<script src="http://dev.mydemosaasapp.com/js/app.js"></script>
<!-- end base js -->

<!-- plugin js -->
<!-- end plugin js -->

</body>
</html>

```
<div id="execution-results-GETpassword-reset--token-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETpassword-reset--token-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-reset--token-"></code></pre>
</div>
<div id="execution-error-GETpassword-reset--token-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-reset--token-"></code></pre>
</div>
<form id="form-GETpassword-reset--token-" data-method="GET" data-path="password/reset/{token}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETpassword-reset--token-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETpassword-reset--token-" onclick="tryItOut('GETpassword-reset--token-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETpassword-reset--token-" onclick="cancelTryOut('GETpassword-reset--token-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETpassword-reset--token-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>password/reset/{token}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="token" data-endpoint="GETpassword-reset--token-" data-component="url" required  hidden>
<br>
</p>
</form>


## Reset the given user&#039;s password.




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTpassword-reset" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTpassword-reset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-reset"></code></pre>
</div>
<div id="execution-error-POSTpassword-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-reset"></code></pre>
</div>
<form id="form-POSTpassword-reset" data-method="POST" data-path="password/reset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTpassword-reset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTpassword-reset" onclick="tryItOut('POSTpassword-reset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTpassword-reset" onclick="cancelTryOut('POSTpassword-reset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTpassword-reset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>password/reset</code></b>
</p>
</form>


## Display the password confirmation view.




> Example request:

```bash
curl -X GET \
    -G "https://dev.mydemosaasapp.com/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html>
<head>
    <title>ExampleSaasApp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="qxsmEcOpasv2Dgm2rVv6FOLnL2BOavnA5F0zcJX6">
    <link rel="shortcut icon" href="http://dev.mydemosaasapp.com/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


<!-- common css -->
    <link href="http://dev.mydemosaasapp.com/css/app.css" rel="stylesheet" />
    <!-- end common css -->

    </head>
<body data-base-url="http://dev.mydemosaasapp.com">




    <div id="app">
        <App></App>
    </div>

<!-- base js -->
<script src="http://dev.mydemosaasapp.com/js/app.js"></script>
<!-- end base js -->

<!-- plugin js -->
<!-- end plugin js -->

</body>
</html>

```
<div id="execution-results-GETpassword-confirm" hidden>
    <blockquote>Received response<span id="execution-response-status-GETpassword-confirm"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-confirm"></code></pre>
</div>
<div id="execution-error-GETpassword-confirm" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-confirm"></code></pre>
</div>
<form id="form-GETpassword-confirm" data-method="GET" data-path="password/confirm" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETpassword-confirm', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETpassword-confirm" onclick="tryItOut('GETpassword-confirm');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETpassword-confirm" onclick="cancelTryOut('GETpassword-confirm');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETpassword-confirm" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>password/confirm</code></b>
</p>
</form>


## Confirm the given user&#039;s password.




> Example request:

```bash
curl -X POST \
    "https://dev.mydemosaasapp.com/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://dev.mydemosaasapp.com/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTpassword-confirm" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTpassword-confirm"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-confirm"></code></pre>
</div>
<div id="execution-error-POSTpassword-confirm" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-confirm"></code></pre>
</div>
<form id="form-POSTpassword-confirm" data-method="POST" data-path="password/confirm" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTpassword-confirm', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTpassword-confirm" onclick="tryItOut('POSTpassword-confirm');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTpassword-confirm" onclick="cancelTryOut('POSTpassword-confirm');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTpassword-confirm" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>password/confirm</code></b>
</p>
</form>



