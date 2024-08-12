<div class="tab-pane fade" id="nav-FAQ" role="tabpanel" aria-labelledby="nav-FAQ-tab">
    <div class="card">
        <div class="card-body" style="background-color: rgba(255,255,255,0.85)">
            <a href="#" class="pull-right btn btn-primary-scale-2 btn-sm">Ask Question &blacktriangleright;</a>
            <br>
            <div class="col-md-12">
                <div class="panel-group" id="accordion">
                    @forelse ($tanzaniaRegionsFAQ as $index => $tanzaniaRegionFAQ)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseDescription{{$index}}" style="font-size: 14px">{{$tanzaniaRegionFAQ->question_title}} &blacktriangledown;</a>
                                </h4>
                            </div>
                            <div id="collapseDescription{{$index}}" class="panel-collapse collapse in">
                                <div class="panel-body">{{$tanzaniaRegionFAQ->question_answer}}</div>
                            </div>
                        </div>
                    @empty
                        <p>No Frequently Asked Questions Available. Begin your curiosity by emailing us your question. We value your privacy and assure you that we won't share the contact information with anyone or any third-party software</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
