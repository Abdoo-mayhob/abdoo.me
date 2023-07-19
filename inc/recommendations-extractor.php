<?php 
?>
<style>
    pre {
        background: #fff;
        border-radius: 10px;
        padding: 40px;
        color: #000000;
        font-size: 15px;
        text-wrap: wrap;
    }

    .container {
        display: flex;
        flex-wrap: nowrap;
        justify-content: center;
    }

    .col {
        width: 50%;
    }

    .col img {
        max-width: 550px;
    }
</style>
<h1>Recommendations Extractor</h1>
<div class="container">
    <div class="col">
        <span>Goto Linked in and insert the raw html of the recommendation parent ul element in the box below</span>
        <form action="POST">
            <textarea name="html_raw" id="html_raw" cols="70" rows="10">
            </textarea>
            <br>
            <button role="button" type="button" class="button-secondary" id="check">Extract Recommendations</button>
        </form>
    </div>
    <div class="col">
        <div>open in newtab to view full size image</div>
        <img src="<?= get_stylesheet_directory_uri() . '/img/Linked-In-recommendation-target-div.png' ?>" alt="">
    </div>
</div>
<pre id="final_data"></pre>
<button role="button" type="button" class="button button-primary button-large" id="Save">Save as Testimonials</button>


<script>
    const HTML_RAW_ELE = document.getElementById('html_raw');
    let recos_final_data = [];
    let html_raw_value = '';
    document.getElementById('check').addEventListener('click', check_raw_html);

    function check_raw_html() {
        html_raw_value = HTML_RAW_ELE.value;
        // Text -> Dom 
        const template = document.createElement('template');
        template.innerHTML = html_raw_value;
        const html = template.content;

        // Get all recos in array of Li
        var recos_li = html.querySelector('ul').childNodes;

        recos_li.forEach(function(li, i) {
            if (li.nodeName === '#text') return; // Ignore white spaces

            var spans = li.querySelectorAll('span.visually-hidden'); // All usable texts are marked with visually-hidden class
            var reco_data = {
                name: spans[0].textContent,
                job: spans[2].textContent,
                text: spans[5].textContent,
                link: spans[5].textContent,
            }
            console.log(reco_data);
            recos_final_data.push(reco_data);
        });
        console.log('Final Data: ', recos_final_data);
        document.getElementById("final_data").textContent = JSON.stringify(recos_final_data, undefined, 2);
    }

    document.getElementById('Save').addEventListener('click', save_testimonials);
    function save_testimonials(){
        if (! confirm("Are you sure?")) return;

        recos_final_data.forEach(function(rec, i) {
            const post = {
                title: rec.name,
                content: rec.text,
                status: 'publish',
                meta: {
                    '<?= TESTIMONIALS_AUTHOR_JOB_META_KEY?>': rec.job
                    '<?= TESTIMONIALS_AUTHOR_LINK_META_KEY?>': rec.link
                }
            };
            console.dir(post);
            // Get first word of post content
            const firstWord = post.content.split(' ')[0];

            // Check if post with same first word in content already exists
            fetch(`/wp-json/wp/v2/testimonials`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-WP-Nonce': '<?= wp_create_nonce('wp_rest')?>'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    // Filter posts to only include those with same first word in content
                    const matchingPosts = data.filter(post => post.content.split(' ')[0] === firstWord);

                    // If no matching posts exist, create new post
                    if (matchingPosts.length === 0) {
                        fetch('/wp-json/wp/v2/testimonials', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-WP-Nonce': '<?= wp_create_nonce('wp_rest')?>'
                                },
                                body: JSON.stringify(post)
                            })
                            .then(res => res.json())
                            .then(data => console.log(data))
                            .catch(error => console.error(error));
                    } else {
                        console.log(`Post with first word "${firstWord}" in content already exists`);
                    }
                })
                .catch(error => console.error(error));
        });

    };
    
    
</script>