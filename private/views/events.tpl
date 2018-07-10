{foreach from=$events item=event}
       <div id="events">
           <h1>{$event[1]}</h1><h4>{$event[3]}</h4>
           <p>{$event[2]}</p>
       </div>
{/foreach}


