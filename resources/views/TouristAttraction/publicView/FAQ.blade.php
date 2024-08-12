<div class="tab-pane fade" id="nav-FAQ" role="tabpanel" aria-labelledby="nav-FAQ-tab">
    <div class="row" style="margin-top: 30px">
        <div class="col-md-12">
            <a href="#" class="pull-right">Ask Question &blacktriangleright;</a>
            <div class="col-md-10" style="margin-top: 10px">
                    <div class="panel-group" id="accordion">
                        @forelse ($touristicAttractionsFaq as $index => $touristicAttractionFaq)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDescription{{$index}}" class="card-text">{{$touristicAttractionFaq->question_title}}</a>
                                    </h4>
                                </div>
                                <div id="collapseDescription{{$index}}" class="panel-collapse collapse in">
                                    <div class="panel-body">{{$touristicAttractionFaq->question_description}}</div>
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
