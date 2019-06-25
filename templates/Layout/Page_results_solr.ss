<div class="grid-container">
    <div class="grid-x">
        <div class="small-12 large-8 cell">
            <div class="form search-results-form search-form-wrapper">
                $SearchForm
            </div>
            <div class="search-query-info">

                <% if $Results.Matches %>
                    <div class="search-query-info__text">
                        <p>
                            <% if $Query %>
                                <%t SEARCH.ResultsCountQuery 'Your search for "{query}" returned {count} result|{count} results' query=$Query count=$Results.Matches.TotalItems %>
                            <% else %>
                                <%t SEARCH.ResultsCount.other 'Your search returned {count} result|{count} results' count=$Results.Matches.TotalItems %>
                            <% end_if %>
                        </p>
                    </div>
                <% end_if %>

                <% if $Results.Suggestion %>
                    <div class="search-query-info__suggestion-text">
                        <p><%t SEARCH.DidYouMean 'Did you mean' %> <a href="{$Link}SearchForm?Search=$Results.SuggestionQueryString">$Results.SuggestionNice</a>?</p>
                    </div>
                <% end_if %>

            </div>
            <% if $Results.Matches %>
                <div class="search-results">
                    <% loop $Results.Matches %>
                        <div class="search-results-item">
                            <div class="search-results-item__title">
                                <a href="$Link">
                                    <% if $MenuTitle %>
                                        $MenuTitle
                                    <% else %>
                                        $Title
                                    <% end_if %>
                                </a>
                            </div>
                            <% if $TopLevelBranch && $TopLevelBranch.ClassName.ShortName == 'BranchPage' %>
                                <a href="$Link" class="search-results-item__branch">
                                    <small>$TopLevelBranch.MenuTitle</small>
                                </a>
                            <% end_if %>
                            <a class="search-results-item__url" href="$Link" title="<%t SEARCH.ReadMoreAbout 'Read more about "{title}"' title=$Title %>">
                                $AbsoluteLink
                            </a>
                            <div class="search-results-item__text">
                                <% if $Abstract %>$Abstract.XML<% else_if $Summary %>$Summary<% else %>$Content.ContextSummary(200)<% end_if %>
                            </div>
                        </div>
                    <% end_loop %>
                </div>
            <% else %>
                <p><%t SEARCH.QueryNoResults 'Sorry, your search query did not return any results' %></p>
            <% end_if %>
            <% if $Results.Matches.MoreThanOnePage %>
                <nav aria-label="Pagination">
                    <ul class="pagination">
                        <% if $Results.Matches.NotFirstPage %>
                            <li class="pagination-previous">
                                <a href="$Results.Matches.PrevLink"><%t SEARCH.Previous 'Previous' %></a>
                            </li>
                        <% end_if %>
                        <% loop $Results.Matches.Pages %>
                            <% if $CurrentBool %>
                                <li class="current">$PageNum</li>
                            <% else %>
                                <li><a href="$Link">$PageNum</a></li>
                            <% end_if %>
                        <% end_loop %>

                        <% if $Results.Matches.NotLastPage %>
                            <li class="pagination-next"><a href="$Results.Matches.NextLink" aria-label="Next page"><%t SEARCH.Next 'Next' %></a></li>
                        <% end_if %>
                    </ul>
                </nav>
            <% end_if %>
        </div>
    </div>
    <%-- end grid-x --%>
</div>
<%-- end grid-container --%>

