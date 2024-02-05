

    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8" />
        <title>How to design t-shirts using HTML &amp; CSS - Forked – The hackable merch platform</title>
        <meta name="description" content="Code your own HTML/CSS t-shirt with Forked!" />
        <meta property="og:title" content="How to design t-shirts using HTML &amp; CSS - Forked – The hackable merch platform" />
        <meta
          property="og:url"
          content="https://forkedmerch.com/how-to-design-a-tshirt-with-html-and-css"
        />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="https://forkedmerch.com/images/og.png" />
        <meta property="og:image:width" content="600" />
        <meta property="og:image:height" content="315" />
        <meta property="og:description" content="Code your own HTML/CSS t-shirt with Forked!" />
        <meta property="og:site_name" content="Forked" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@_forked" />
        <meta name="twitter:image:alt" content="A t-shirt with a design that says “hello world” with text next to it that says ”Forked. The hackable merch playform”" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="/common.js" defer></script>
        <style>
          @import url("https://rsms.me/inter/inter.css");
        </style>

        
              <script src="/editor.js" defer></script>
            
        <link rel="stylesheet" href="/styles/index.css" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script
          async
          src="https://www.googletagmanager.com/gtag/js?id=UA-149346710-1"
        ></script>
        <script>
          document.documentElement.className = "js";
        </script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag() {
            dataLayer.push(arguments);
          }
          gtag("js", new Date());

          gtag("config", "UA-149346710-1");
        </script>
      </head>
      <body>
        
    <hp-nav class="hp-nav">
      <header role="banner" class="hp-nav__header">
        <nav class="hp-nav__nav">
          <a href="/" class="hp-nav__logo">Forked.</a>
          <div class="row hp-nav__list-container hp-nav__row" id="navContainer">
            <div class="col-5 col-offset-1 hp-nav__col">
              <ul class="hp-nav__list" aria-label="Main navigation list">
                <li class="hp-nav__list-item">
                  <a href="/" class="hp-nav__list-link">Hack a new tee</a>
                </li>
                <li class="hp-nav__list-item">
                  <a href="/fonts" class="hp-nav__list-link">Browse designs</a>
                </li>
                <li class="hp-nav__list-item">
                  <a href="/about" class="hp-nav__list-link">About Forked</a>
                </li>
                <li class="hp-nav__list-item">
                  <a href="/about#contact" class="hp-nav__list-link">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
    </hp-nav>
  
        <div class="hp-content">
          
    <main class="hp-main v-space-l">
      <div class="hp-editorial-content">
        <h1>How to design t-shirts using HTML & CSS</h1>
        <p>
          Designing a t-shirt on Forked is just like building a web page, we add
          content with HTML and style with CSS. This how-to guide will walk you
          through creating a simple t-shirt design.
        </p>
        <section>
          <h2>Choose a t-shirt colour</h2>
          <p>
            Using the t-shirt colour selector, choose the t-shirt colour you
            would like. We've chosen red for our example design.
          </p>
          <figure>
            <img
              src="/images/how-to/how-to-select-t-shirt-color.jpeg"
              alt="A screengrab of the Forked t-shirt code editor with a preview on a plain red t-shirt."
            />
          </figure>
          <p>
            🚧<em
              >The colour selector is very basic at the moment, we are planning
              to improve this.
            </em>
          </p>
        </section>

        <section>
          <h2>Add some content</h2>
          <p>
            Next we’ll add some content to the design by writing some HTML in
            the HTML tab. In the example we are adding the HTML
            <code>&lt;h1&gt;starred&lt;/h1&gt;</code>
          </p>
          <figure>
            <img
              src="/images/how-to/how-to-add-tshirt-html.jpeg"
              alt="A screengrab of the Forked t-shirt code editor, with some HTML in the editor and some unstyled text ‘starred’ on a preview of a red t-shirt."
            />
          </figure>
          <p>
            You can also add SVG code in the HTML tab. Let’s grab an
            <a
              href="https://github.com/shgysk8zer0/octicons-svg/blob/master/star.svg"
              >open source SVG from GitHub</a
            >
            and paste the SVG code at the bottom of our HTML.
          </p>
          <figure>
            <img
              src="/images/how-to/how-to-add-tshirt-svg.jpeg"
              alt="A screengrab of the Forked t-shirt code editor, with some HTML & SVG code in the editor and some unstyled text saying ‘starred’ and a tiny black star on a preview of a red t-shirt."
            />
            <figcaption>
              Okay, it doesn‘t look very good yet but we’re getting there.
            </figcaption>
          </figure>
        </section>
        <section>
          <h2>Add some style</h2>
          <p>
            Writing CSS on Forked is just like writing CSS for web pages, but
            with two important exceptions.
          </p>

          <h3>Don't use pixel units</h3>
          <p>
            Instead of using pixels for spacing, font sizes etc, use viewport
            relative units such as <code>vh</code> and <code>vw</code>. This
            will ensure your design scales correctly for printing. If you are
            not familiar with viewport relative units,
            <a
              href="https://css-tricks.com/fun-viewport-units/#article-header-id-0"
              >this article on CSS tricks</a
            >
            is a good starting point. In this context, the viewport is the print
            zone on the t-shirt. The printable zone on the t-shirt is actually
            an iframe!
          </p>

          <h3>Don’t rely on opacity</h3>
          <p>
            T-shirt printers struggle with opacity, so instead use solid colors.
          </p>
          <p>With that in mind, we’ll add the following CSS rules:</p>
          <pre><code>svg {
      fill: white;
      width: 100vw;
      height: auto;
  }

  h1 {
      position: absolute;
      text-align: center;
      z-index: 1;
      width: 100%;
      top: 30vh;
      font-family: "dm";
  }</code></pre>
          <p>
            Here we are absolutley positioning the text on top of the svg, just
            as we might on a web page. Note that the sizes are using viewport
            relative units as mentioned above.
          </p>
          <p>
            We've set font to <code>"dm"</code> which is
            <a href="/fonts/dank-mono">Dank Mono</a>. You can see a
            <a href="/about#fonts"
              >full list of fonts available on Forked here</a
            >.
          </p>
          <figure>
            <img
              src="/images/how-to/how-to-add-tshirt-css.jpeg"
              alt="A screengrab of the Forked t-shirt code editor, with some CSS code in the editor and some styled text saying ‘starred’ on a large white start on a preview of a red t-shirt."
            />
            <figcaption>
              I don’t think it’s going to win any fashion awards but we created
              a simple design using our HTML & CSS knowledge
            </figcaption>
          </figure>
        </section>
        <section>
          <h2>Save your design</h2>
          <p>
            When it comes to saving your design you can give it a name and
            description.
          </p>
          <figure>
            <img
              src="/images/how-to/how-to-save-tshirt-design.jpeg"
              alt="A screengrab of a form beneath the Forked t-shirt code editor with name a description field and a button that says ‘Save this fork’."
            />
            <figcaption>
              The name in this image was auto generated from the t-shirt
              content.
            </figcaption>
          </figure>
          <p>
            Hitting ‘Save this fork’ will publish you design and create a
            product page.
          </p>
          <figure>
            <img
              src="/images/how-to/generated-t-shirt.jpeg"
              alt="A screengrab of a product page featuring a mock-up of a star t-shirt design, buy button and product description."
            />
            <figcaption>Success!</figcaption>
          </figure>
        </section>
      </div>
      <section class="v-space-m">
        <div>
          <h2>Try it for yourself</h2>
          <div class="row">
            <div class="col-3">
              <p class="text-light text-body">
                Start coding in the editor 👇 or
                <a href="/fonts">browse existing designs</a> and find something
                to hack on.
              </p>
            </div>
          </div>
        </div>
        
    <form action="/publish" method="POST">
      <hp-editor data-view-data="{}">
        <div class="hp-editor">
          <header class="hp-editor__header">
            <div class="hp-editor__header-col">
              <div class="hp-tablist" data-label="Code editor">
                
    <a
      href="#html-label"
      class="hp-tablist__tab"
      data-hp-editor-tab="html"
      data-hp-editor-group="code"
    >
      HTML
    </a>
  
                
    <a
      href="#css-label"
      class="hp-tablist__tab"
      data-hp-editor-tab="css"
      data-hp-editor-group="code"
    >
      CSS
    </a>
  
                
    <a
      href="#base-label"
      class="hp-tablist__tab"
      data-hp-editor-tab="base"
      data-hp-editor-group="code"
    >
      Base
    </a>
  
              </div>
            </div>
            <div class="hp-editor__header-col">
              <div
                role="tablist"
                class="hp-tablist hp-tablist--bordered"
                data-label="Product previews"
              >
                
    <a
      href="#mens-preview-panel"
      class="hp-tablist__tab"
      data-hp-editor-tab="mens-preview"
      data-hp-editor-group="preview"
    >
      Preview
    </a>
  
              </div>
            </div>
          </header>
          <div class="hp-editor__body">
            
    <div
      class="hp-editor__code"
      data-hp-editor-panel="html"
      data-hp-editor-group="code"
      id="html-panel"
      tabindex="-1"
      
    >
      <div class="hp-editor__field">
        <label
          id="html-label"
          for="html"
          class="hp-editor__label visually-hidden"
          >HTML</label
        >
        <textarea
          class="hp-editor__textarea"
          id="html"
          name="html"
          
          data-mode="htmlmixed"
        >
  &lt;!-- Add your html here --&gt;</textarea
        >
      </div>
    </div>
  
            
    <div
      class="hp-editor__code"
      data-hp-editor-panel="css"
      data-hp-editor-group="code"
      id="css-panel"
      tabindex="-1"
      hidden
    >
      <div class="hp-editor__field">
        <label
          id="css-label"
          for="css"
          class="hp-editor__label visually-hidden"
          >CSS</label
        >
        <textarea
          class="hp-editor__textarea"
          id="css"
          name="css"
          
          data-mode="css"
        >
  /** Add your CSS here */</textarea
        >
      </div>
    </div>
  
            
    <div
      class="hp-editor__code"
      data-hp-editor-panel="base"
      data-hp-editor-group="code"
      id="base-panel"
      tabindex="-1"
      hidden
    >
      <div class="hp-editor__field">
        <label
          id="base-label"
          for="base"
          class="hp-editor__label visually-hidden"
          >Base</label
        >
        <textarea
          class="hp-editor__textarea"
          id="base"
          name="baseCss"
          readonly
          data-mode="css"
        >
  /* Some base styles. Read only.  */
* {
    box-sizing: border-box;
}

body {
    height: 100vh;
    margin: 0;
    overflow: hidden;
    font-size: 6vw;
    background-color: transparent;
}</textarea
        >
      </div>
    </div>
  
            <div class="hp-editor__settings">
              <label for="backgroundColor">tshirt-color:</label>
              <select name="backgroundColor" id="backgroundColor">
                
                    <option value="#FFFFFF" 
                      >#FFFFFF White</option
                    >
                  
                    <option value="#27262B" 
                      >#27262B Black</option
                    >
                  
                    <option value="#372D2C" 
                      >#372D2C Brown</option
                    >
                  
                    <option value="#2A282B" 
                      >#2A282B Black Heather</option
                    >
                  
                    <option value="#4F5549" 
                      >#4F5549 Heather Forest</option
                    >
                  
                    <option value="#35353F" 
                      >#35353F Midnight Navy</option
                    >
                  
                    <option value="#434C31" 
                      >#434C31 Olive</option
                    >
                  
                    <option value="#505457" 
                      >#505457 Asphalt</option
                    >
                  
                    <option value="#37384a" 
                      >#37384a Navy</option
                    >
                  
                    <option value="#1F4A2E" 
                      >#1F4A2E Forest</option
                    >
                  
                    <option value="#3E3C3D" 
                      >#3E3C3D Dark Grey Heather</option
                    >
                  
                    <option value="#836652" 
                      >#836652 Army</option
                    >
                  
                    <option value="#548655" 
                      >#548655 Leaf</option
                    >
                  
                    <option value="#426275" 
                      >#426275 Heather Deep Teal</option
                    >
                  
                    <option value="#4D657D" 
                      >#4D657D Steel Blue</option
                    >
                  
                    <option value="#190406" 
                      >#190406 Oxblood Black</option
                    >
                  
                    <option value="#A8ABB2" 
                      >#A8ABB2 Athletic Heather</option
                    >
                  
                    <option value="#B8BCBF" 
                      >#B8BCBF Silver</option
                    >
                  
                    <option value="#016D56" 
                      >#016D56 Kelly</option
                    >
                  
                    <option value="#BF6E6E" 
                      >#BF6E6E Mauve</option
                    >
                  
                    <option value="#D3C4AD" 
                      >#D3C4AD Soft Cream</option
                    >
                  
                    <option value="#A1C3B8" 
                      >#A1C3B8 Heather Prism Dusty Blue</option
                    >
                  
                    <option value="#EEF0F2" 
                      >#EEF0F2 Ash</option
                    >
                  
                    <option value="#E0CBB7" 
                      >#E0CBB7 Heather Dust</option
                    >
                  
                    <option value="#AAD4B7" 
                      >#AAD4B7 Heather Prism Mint</option
                    >
                  
                    <option value="#18498C" 
                      >#18498C True Royal</option
                    >
                  
                    <option value="#94AFCA" 
                      >#94AFCA Light Blue</option
                    >
                  
                    <option value="#86A9C9" 
                      >#86A9C9 Heather Blue</option
                    >
                  
                    <option value="#EEC1B3" 
                      >#EEC1B3 Heather Prism Peach</option
                    >
                  
                    <option value="#C0E3E4" 
                      >#C0E3E4 Heather Prism Ice Blue</option
                    >
                  
                    <option value="#619DC1" 
                      >#619DC1 Ocean Blue</option
                    >
                  
                    <option value="#5191BD" 
                      >#5191BD Aqua</option
                    >
                  
                    <option value="#72D3B4" 
                      >#72D3B4 Heather Mint</option
                    >
                  
                    <option value="#D96E51" 
                      >#D96E51 Heather Orange</option
                    >
                  
                    <option value="#D76735" 
                      >#D76735 Burnt Orange</option
                    >
                  
                    <option value="#C85313" 
                      >#C85313 Autumn</option
                    >
                  
                    <option value="#B17E85" 
                      >#B17E85 Heather Orchid</option
                    >
                  
                    <option value="#FBF271" 
                      >#FBF271 Yellow</option
                    >
                  
                    <option value="#5F98E6" 
                      >#5F98E6 Heather True Royal</option
                    >
                  
                    <option value="#EDA027" 
                      >#EDA027 Mustard</option
                    >
                  
                    <option value="#D9B0CD" 
                      >#D9B0CD Heather Prism Lilac</option
                    >
                  
                    <option value="#F8A933" 
                      >#F8A933 Gold</option
                    >
                  
                    <option value="#A02331" 
                      >#A02331 Red</option
                    >
                  
                    <option value="#C13C7E" 
                      >#C13C7E Berry</option
                    >
                  
                    <option value="#FCD1DB" 
                      >#FCD1DB Pink</option
                    >
                  
                    <option value="#F4B0C8" 
                      >#F4B0C8 Lilac</option
                    >
                  
                    <option value="#FC667D" 
                      >#FC667D Heather Raspberry</option
                    >
                  
              </select>
            </div>
            
    <hp-preview
      class="hp-editor__preview-item"
      data-hp-editor-panel="mens-preview"
      data-hp-editor-group="preview"
      id="mens-preview-panel"
      tabindex="-1"
    >
      <pinch-zoom class="hp-editor__preview-zoom">
        <div class="hp-editor__preview-bg">
          
    <svg
      fill="none"
      height="403"
      viewBox="0 0 308 403"
      width="308"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="m157.563 401.408c79.471-2.838 96.374-20.579 96.374-20.579-3.667-72.855-12.605-142.221-4.584-217.62h5.845c28.82.947 51.854-9.166 51.854-9.166-12.606-70.3122-26.414-111.8255-26.414-111.8255-4.206-9.2175-10.428-11.2199-10.428-11.2199l-61.996-29.28813c-15.643 10.46703-50.651 9.81653-50.651 9.81653h-6.704s-35.009.6505-50.651-9.81653l-61.9961 30.28813s-7.0298 2.0024-10.4281 10.2199c0 0-13.8087 41.5133-26.41417 111.8255 0 0 23.03357 10.113 51.85427 9.166h5.8443c7.9644 75.399-.9167 144.765-4.5838 217.62 0 0 16.9028 17.741 96.3746 20.579z"
        fill="0"
        id="tshirtColor"
      />
      <path
        d="m118.601 9.1014s-10.486-4.55346-6.418 4.5535c0 0 8.595 14.9022 30.998 17.445 0 0-34.035-.9461-42.973-28.79912z"
        fill="#000"
        fill-opacity=".4"
      />
      <g stroke="#000">
        <path
          d="m157.563 401.408c79.471-2.838 96.374-20.579 96.374-20.579-3.667-72.855-12.605-142.221-4.584-217.62h5.845c28.82.947 51.854-9.166 51.854-9.166-12.606-70.3122-26.414-111.8255-26.414-111.8255-4.206-9.2175-10.428-11.2199-10.428-11.2199l-30.998-13.644-30.998-15.64413c-15.643 10.46703-50.651 9.81653-50.651 9.81653h-6.704s-35.009.6505-50.651-9.81653l-30.5259 15.79053-31.4702 14.4976s-7.0298 2.0024-10.4281 10.2199c0 0-13.8087 41.5133-26.41417 111.8255 0 0 23.03357 10.113 51.85427 9.166h5.8443c7.9644 75.399-.9167 144.765-4.5838 217.62 0 0 16.9028 17.741 96.3746 20.579z"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-miterlimit="10"
          stroke-width="1.5"
        />
        <path
          d="m38.6821 32s13.3385 21.6311 20.3861 131.21"
          stroke-miterlimit="10"
        />
        <path
          d="m55.6821 366.5s17.6533 17.996 97.1249 20.834h2.808c79.471-2.838 97.567-21.334 97.567-21.334"
          stroke-miterlimit="10"
          stroke-opacity=".2"
          stroke-width=".75"
        />
        <path
          d="m3.43262 143.636s25.32548 10.94 54.71908 9.994"
          stroke-miterlimit="10"
          stroke-opacity=".2"
          stroke-width=".75"
        />
      </g>
      <path
        d="m189.878 9.1014s10.486-4.55346 6.418 4.5535c0 0-8.595 14.9022-30.998 17.445 0 0 34.035-.9461 42.973-28.79912z"
        fill="#000"
        fill-opacity=".4"
      />
      <path
        d="m261.182 120.5s-8.297 3.937-9.5 12.512m45.375-27.637c2 10.625 0 17.125-1.875 22.125"
        stroke="#000"
        stroke-linecap="round"
        stroke-miterlimit="10"
        stroke-width=".75"
      />
      <path
        d="m270.182 31s-13.781 22.6311-20.828 132.21"
        stroke="#000"
        stroke-miterlimit="10"
      />
      <path
        d="m305.182 143.375s-26.148 11.319-54.969 10.373"
        stroke="#000"
        stroke-miterlimit="10"
        stroke-opacity=".2"
        stroke-width=".75"
      />
      <path
        d="m100.208 1.70947c11.345 40.38973 96.661 40.38973 108.006 0"
        stroke="#000"
        stroke-miterlimit="10"
      />
      <path
        d="m171.932 358.25c-18.5-3.25-46.25-20.5-62.25-30.75 33.75 18 70.25 31 89.25 34-4.75 2.25-12.193-.649-27-3.25z"
        fill="#000"
        fill-opacity=".1"
      />
      <path
        d="m251.057 140c1.406 4.938 3.625 5.719 23.5 7.062-5.781-.687-17.156-3.218-23.5-7.062z"
        fill="#000"
        fill-opacity=".1"
      />
      <path
        d="m261.182 120.5c-8.375 4.25-9.375 11.417-9.875 14.5v3.125c0-2.5 6.25-13.625 9.875-17.625z"
        fill="#000"
        fill-opacity=".1"
      />
      <path
        d="m15.9321 85.125c2.3334-5.1667 7.7-16 10.5-18"
        stroke="#000"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width=".75"
      />
      <path
        d="m62.1821 264.5c.0835.555.17 1.127.2595 1.714 2.076 8.64 15.9851 36.1 18.9905 43.036 2.6 6 3.25 8.625 3.0834 9.125l4.1666 10.5c-2.375 0-7.4-7.5-10-10.5-3.25-3.75-5.625-10.875-9.125-18.625-2.6598-5.89-5.4174-22.397-7.1155-33.536-.1689-.703-.2595-1.281-.2595-1.714z"
        fill="#000"
        fill-opacity=".1"
      />
      <path
        d="m246.432 248c.333 17.833-2.55 58.45-16.75 78.25"
        stroke="#000"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width=".75"
      />
      <path
        d="m38.3071 148.875c17.25-1.019 17.3334-3.76 19.25-6.5v5.481c-1.5833.539-7.125 2.144-19.25 1.019z"
        fill="#000"
        fill-opacity=".1"
      />
      <path
        d="m56.1821 132.5c-.5342-5.067-13.7558-19.528-20.2998-26.125l2.0033 8.708c6.3214 7.873 8.0131 5.014 18.2965 17.417z"
        fill="#000"
        fill-opacity=".1"
      />
      <path
        d="m36.1821 106.625c3.5834 3.833 11.15 11.975 12.75 13.875 2 2.375 7.125 8.875 7.625 12"
        stroke="#000"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width=".75"
      />
      <path
        d="m61.9321 265.5c3.6667 8.833 11.6 27.7 14 32.5 3 6 8.5 17.75 8.25 19.25"
        stroke="#000"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width=".75"
      />
    </svg>
  
          <div class="hp-editor__preview">
            <iframe
              tabindex="-1"
              class="hp-editor__preview-frame"
              role="img"
              aria-label="A preview of the design on a unisex t-shirt"
              srcdoc="
    &lt;!DOCTYPE html&gt;
    &lt;html&gt;
      &lt;head&gt;
        &lt;link href=&quot;/css/dank-mono.css&quot; rel=&quot;stylesheet&quot; /&gt;
        &lt;link
          href=&quot;/css/editor-fonts.css&quot;
          rel=&quot;stylesheet&quot;
          crossorigin=&quot;forked&quot;
        /&gt;
        &lt;style id=&quot;font-stylesheets&quot;&gt;
          /* Some base styles. Read only.  */
* {
    box-sizing: border-box;
}
body {
    height: 100vh;
    margin: 0;
    overflow: hidden;
    font-size: 6vw;
    background-color: transparent;
}
        &lt;/style&gt;
        &lt;style id=&quot;styles&quot;&gt;
          /** Add your CSS here */
        &lt;/style&gt;
      &lt;/head&gt;
      &lt;body&gt;
        &lt;!-- Add your html here --&gt;
      &lt;/body&gt;
    &lt;/html&gt;
  "
            ></iframe>
          </div>
        </div>
      </pinch-zoom>
      <div class="hp-editor__preview-controls">
        <button
          type="button"
          class="hp-icon-btn"
          data-zoom="in"
          aria-label="Zoom in"
        >
          <svg
            width="17"
            height="18"
            viewBox="0 0 17 18"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            role="presentation"
          >
            <path
              d="M9.83333 7.45833V0.958333H6.5V7.45833H0.041667V10.7917H6.5V17.2917H9.83333V10.7917H16.4167V7.45833H9.83333Z"
              fill="#11182C"
            />
          </svg>
        </button>
        <span class="hp-editor__zoom-title">Zoom</span>
        <button
          type="button"
          class="hp-icon-btn"
          data-zoom="out"
          aria-label="Zoom out"
        >
          <svg
            width="17"
            height="5"
            viewBox="0 0 17 5"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            role="presentation"
          >
            <path
              d="M16.4167 0.833333H0.125V4.16667H16.4167V0.833333Z"
              fill="#11182C"
            />
          </svg>
        </button>
      </div>
    </hp-preview>
  
          </div>
        </div>
        <input type="hidden" name="svgImage" />
        
            <input type="hidden" name="parent" value="IxVEum-e" />
          
        
              <input
                type="hidden"
                name="crew"
                value="5dbd3dd0b9fbe0763059f726"
              />
            
        
              <input
                type="hidden"
                name="product"
                value="5de8f9181a0ddb24e72a224f"
              />
            
        <fieldset class="hp-editor__fieldset hp-container">
          <div class="row row--tablet-stacked">
            <div class="col-3">
              <div class="hp-editor__legend">
                <h3 class="h3">Finished hacking?</h3>
                <p class="text-body-s text-light">
                  When you’re done, fork and save this tee!
                </p>
              </div>
            </div>
            <div class="col-3 v-space-20">
              
              
    <div class="hp-input ">
      <div class="hp-input__label-row">
        <label for="design-name" class="hp-input__label"
          >New t-shirt name</label
        >
        
      </div>
      
        <input
          type="text"
          id="design-name"
          name="name"
          
          class="hp-input__input"
          value="blank"
          autocomplete="undefined"
        />
      
    </div>
  
              
    <div class="hp-input ">
      <div class="hp-input__label-row">
        <label for="design-description" class="hp-input__label"
          >Description</label
        >
        
      </div>
      
        <textarea
          id="design-description"
          name="description"
          
          class="hp-input__input hp-input__input--textarea"
          autocomplete="undefined"
        >
</textarea
        >
      
    </div>
  
            </div>
          </div>
          <div class="hp-editor__footer">
            <button type="submit" class="hp-btn hp-editor__footer-btn">
              Save this fork
            </button>
          </div>
        </fieldset>
      </hp-editor>
    </form>
  
      </section>
    </main>
  
          <footer class="hp-footer row">
            <div class="col-2">
              <h2 class="text-heading-xs">About Forked</h2>
              <ul class="text-light text-body-s">
                <li><a href="/about#">What is Forked?</a></li>
                <li>
                  <a href="/about#hackable-merch">Hackable merch</a>
                </li>
              </ul>
            </div>
            <div class="col-2">
              <h2 class="text-heading-xs">Shopping help</h2>
              <ul class="text-light text-body-s">
                <li><a href="/about#returns">Returns policy</a></li>
                <li>
                  <a href="/about#shipping-destinations"
                    >Shipping destinations</a
                  >
                </li>
                <li>
                  <a href="/about#shipping-time">Shipping times</a>
                </li>
                <li>
                  <a href="/about#payment-methods">Payment methods</a>
                </li>
              </ul>
            </div>
            <div class="col-2">
              <h2 class="text-heading-xs">How to</h2>
              <ul class="text-light text-body-s">
                <li>
                  <a href="/how-to-design-a-tshirt-with-html-and-css"
                    >Design a t-shirt with HTML & CSS</a
                  >
                </li>
                <li>
                  <a href="/how-to-design-a-tshirt-with-dynamic-content"
                    >Design a t-shirt with dynamic content</a
                  >
                </li>
                <li><a href="/about#fonts">Which fonts can I use?</a></li>
                <li>
                  <a href="/about#CSS">How should I write my CSS?</a>
                </li>
              </ul>
            </div>
          </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/srcdoc-polyfill@1.0.0/srcdoc-polyfill.min.js"></script>
      </body>
    </html>
  