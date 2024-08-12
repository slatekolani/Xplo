<div class="tab-pane fade" id="nav-economicActivities" role="tabpanel" aria-labelledby="nav-economicActivities-tab">
    <div class="row">
        <div class="col-md-12">
            <h4>Dominant Economic Activity: <span style="color: dodgerblue">{{$tanzaniaRegion->regionEconomicActivity->economic_activity_title}}</span></h4>
                <span>Others &blacktriangledown;</span>
            <div class="row">
               <table>
                   <tbody>
                   @foreach ($tanzaniaRegion->RegionEconomicActivitiesLabel as $economicActivity)
                       <div class="col-md-12">
                           <div class="economic-activity">
                               <div class="panel panel-default" style="border: 2px solid #ddd; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                   <div class="panel-heading" style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #ddd; border-radius: 8px 8px 0 0;">
                                       <div class="panel-title">
                                           <h5 style="font-size:20px;font-weight: bold; color: #007bff;">&star;{{$economicActivity['title']}}</h5>
                                       </div>
                                   </div>
                                   <div class="panel-body" style="padding: 15px;">
                                       <p style="font-size: 15px; color: #555;">{{$economicActivity['description']}}</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   @endforeach
                   </tbody>
               </table>
        </div>
    </div>
</div>
</div>
