<x-app-shell title="Inventory" active="inventory">
    <header class="topbar dashboard-topbar">
        <div>
            <p class="eyebrow">Stock control</p>
            <h1>Inventory</h1>
            <p class="dashboard-subtitle">Monitor materials used for laundry and water refill services.</p>
        </div>
        <button class="primary-link" type="button">+ Add stock item</button>
    </header>

    <section class="inventory-summary" aria-label="Inventory summary">
        <article>
            <p>Total inventory items</p><strong>18</strong><span>Across 2 service lines</span>
        </article>
        <article>
            <p>Low stock</p><strong>3</strong><span>Below reorder level</span>
        </article>
        <article>
            <p>Out of stock</p><strong>0</strong><span>All services available</span>
        </article>
        <article>
            <p>Estimated stock value</p><strong>Php 8,450</strong><span>Current on-hand cost</span>
        </article>
    </section>

    <section class="dashboard-panel inventory-table-panel">
        <div class="inventory-toolbar">
            <div>
                <p class="section-label">Item list</p>
                <h2>Supplies and materials</h2>
            </div>
            <div class="inventory-actions"><label class="search-field"><span>⌕</span><input type="search"
                        placeholder="Search items"></label><select aria-label="Filter inventory">
                    <option>All categories</option>
                    <option>Laundry supplies</option>
                    <option>Water refill supplies</option>
                </select></div>
        </div>
        <div class="inventory-table-wrap">
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Category</th>
                        <th>On hand</th>
                        <th>Reorder level</th>
                        <th>Unit cost</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Detergent powder</strong><small>SKU: LND-001</small></td>
                        <td>Laundry supplies</td>
                        <td>2 packs</td>
                        <td>10 packs</td>
                        <td>Php 58.00</td>
                        <td><span class="status low">Low stock</span></td>
                        <td><button class="table-button" type="button">Restock</button></td>
                    </tr>
                    <tr>
                        <td><strong>Fabric softener</strong><small>SKU: LND-002</small></td>
                        <td>Laundry supplies</td>
                        <td>3 bottles</td>
                        <td>8 bottles</td>
                        <td>Php 72.00</td>
                        <td><span class="status low">Low stock</span></td>
                        <td><button class="table-button" type="button">Restock</button></td>
                    </tr>
                    <tr>
                        <td><strong>Water caps</strong><small>SKU: WTR-003</small></td>
                        <td>Water refill supplies</td>
                        <td>35 pcs</td>
                        <td>100 pcs</td>
                        <td>Php 1.50</td>
                        <td><span class="status low">Low stock</span></td>
                        <td><button class="table-button" type="button">Restock</button></td>
                    </tr>
                    <tr>
                        <td><strong>Water seals</strong><small>SKU: WTR-004</small></td>
                        <td>Water refill supplies</td>
                        <td>240 pcs</td>
                        <td>100 pcs</td>
                        <td>Php 0.80</td>
                        <td><span class="status ready">In stock</span></td>
                        <td><button class="table-button" type="button">Adjust</button></td>
                    </tr>
                    <tr>
                        <td><strong>Laundry bags</strong><small>SKU: LND-005</small></td>
                        <td>Laundry supplies</td>
                        <td>50 pcs</td>
                        <td>20 pcs</td>
                        <td>Php 4.00</td>
                        <td><span class="status ready">In stock</span></td>
                        <td><button class="table-button" type="button">Adjust</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</x-app-shell>
