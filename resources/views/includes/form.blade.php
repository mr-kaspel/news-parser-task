@section('form-parse')
<form action="{{ route('pars-controller') }}" method="post">
    @csrf
    <div class="p-2">
        <button type="submit" class="btn btn-primary">Собрать новости</button>
    </div>

    <div class="accordion p-2" id="accordionExample">
        <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Настройки
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="mb-3">
                    <label for="address" class="form-label">Адрес сайта</label>
                    <input class="form-control" id="address" type="text" name="address" value="https://ekb.rbc.ru/v10/ajax/get-news-feed/project/rbcnews.ekb/lastDate/{timestamp}/limit/{count}?_={timestamp}">
                    <div class="form-text">Адрес c данными в json формате. <mark>{timestamp}</mark> - временная метка для получения актуальных новостей, меняется автоматически.</div>
                </div>
               <div class="mb-3">
                    <label for="count-elements" class="form-label">Количество элементов</label>
                    <input class="form-control" id="count" type="number" min="10" name="count" value="15">
                    <div class="form-text">Укажите максимальное количество элементов</div>
                </div>
                <div class="mb-3">
                    <label for="class-name-href" class="form-label">Ссылка на детальную страницу</label>
                    <input class="form-control" id="class-name-href" type="text" name="class-name-href" value="normalize-space(//a[contains(&#64;class, &quot;news-feed__item js-news-feed-item js-yandex-counter&quot;)]/&#64;href)">
                    <div class="form-text">XPath-выражение для поиска ссылки на детальную страницу</div>
                </div>
                <div class="mb-3">
                    <label for="class-name-title" class="form-label">Заголовок</label>
                    <input class="form-control" id="class-name-title" type="text" name="class-name-title" value="normalize-space(//span[contains(&#64;class, &quot;news-feed__item__title&quot;)])">
                    <div class="form-text">XPath-выражение для поиска заголовка блока</div>
                </div>
                <div class="mb-3">
                    <label for="class-name-additionally" class="form-label">Дополнительная информация</label>
                    <input class="form-control" id="class-name-additionally" type="text" name="class-name-additionally" value="normalize-space(//span[contains(&#64;class, &quot;news-feed__item__date-text&quot;)])">
                    <div class="form-text">XPath-выражение для поиска дополнительной информации</div>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="attribute-detailed-description" class="form-label">Подробное описание</label>
                    <input class="form-control" id="attribute-detailed-description" type="text" name="attribute-detailed-description" value="normalize-space(//div[contains(&#64;itemprop, &quot;articleBody&quot;)])">
                    <div class="form-text">XPath-выражение для поиска подробного описания на детальной странице</div>
                </div>
                <div class="mb-3">
                    <label for="attribute-detailed-img" class="form-label">Изображение</label>
                    <input class="form-control" id="attribute-detailed-img" type="text" name="attribute-detailed-img" value="normalize-space(//img[contains(&#64;class, &quot;article__main-image__image&quot;)]/&#64;src)">
                    <div class="form-text">XPath-выражение для поиска изображения на детальной странице</div>
                </div>
            </div>
        </div>
        </div>
    </div>
</form>