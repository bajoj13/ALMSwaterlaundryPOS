<x-app-shell title="Settings" active="settings">
    <header class="topbar dashboard-topbar">
        <div>
            <p class="eyebrow">System preferences</p>
            <h1>Settings</h1>
            <p class="dashboard-subtitle">Customize the LaundryPOS workspace for your team.</p>
        </div>
    </header>

    <section class="settings-panel dashboard-panel" aria-labelledby="theme-heading">
        <div class="panel-heading">
            <div>
                <p class="section-label">Appearance</p>
                <h2 id="theme-heading">Color theme</h2>
            </div>
            <span class="settings-status" id="theme-status">Blue selected</span>
        </div>
        <p class="settings-description">Choose a theme for the navigation, buttons, and workspace accents.</p>
        <div class="theme-grid" role="radiogroup" aria-label="Color theme">
            <label class="theme-choice theme-choice-blue">
                <input type="radio" name="theme" value="blue" data-theme-choice>
                <span class="theme-preview"><i></i><b></b><em></em></span>
                <strong>Blue</strong><small>Default</small>
            </label>
            <label class="theme-choice theme-choice-light">
                <input type="radio" name="theme" value="light" data-theme-choice>
                <span class="theme-preview"><i></i><b></b><em></em></span>
                <strong>Light</strong><small>Soft neutral</small>
            </label>
            <label class="theme-choice theme-choice-dark">
                <input type="radio" name="theme" value="dark" data-theme-choice>
                <span class="theme-preview"><i></i><b></b><em></em></span>
                <strong>Dark</strong><small>Low light</small>
            </label>
            <label class="theme-choice theme-choice-green">
                <input type="radio" name="theme" value="green" data-theme-choice>
                <span class="theme-preview"><i></i><b></b><em></em></span>
                <strong>Green</strong><small>Fresh service</small>
            </label>
            <label class="theme-choice theme-choice-red">
                <input type="radio" name="theme" value="red" data-theme-choice>
                <span class="theme-preview"><i></i><b></b><em></em></span>
                <strong>Red</strong><small>High contrast</small>
            </label>
        </div>
    </section>
</x-app-shell>
