document.write(`
<div class="import-form">
            <div>
                <h2>Αναζήτηση</h2>
            </div>
            
            <form action="index.php" method="get" class="add">

                <div class="column">
                
                    <label for="department" class="labels">Τμήμα:</label>
                        
                        <select name="department" id="department">
                            <option value="">Όλα τα τμήματα</option>
                            <option value="Καρδιολογικό">Καρδιολογικό</option>
                            <option value="Βιοχημικό">Βιοχημικό</option>
                            <option value="Πνευμονολογική">Πνευμονολογική 1</option>
                            <option value="Αξονικός">Αξονικός</option>
                        </select>
                    <br>
                </div>

                <div class="column">
                    <label for="specialty" class="labels">Ειδικότητα:</label>
                        <select name="specialty" id="specialty">
                            <option value="">Όλες οι ειδικότητες</option>
                            <option value="Προϊστάμενος">Προϊστάμενος</option>
                            <option value="Γραφέιο Ιατρών">Γραφέιο Ιατρών</option>
                        </select>
                    <br>
                </div>

                <div class="column">
                    <label for="phone" class="labels">Τηλέφωνο:</label>
                    <input type="text" name="phone" id="phone" placeholder="Όλα τα τηλέφωνα" autocomplete="off">
                    <br>
                </div>

                <div class="column">
                    <label for="hardware" class="labels">Είδος:</label>
                        <select name="hardware" id="hardware">
                            <option value="">Όλα τα είδη</option>
                            <option value="Η/Υ">Η/Υ</option>
                            <option value="Εκτυπωτής">Εκτυπωτής</option>
                            <option value="Οθόνη">Οθόνη</option>
                            <option value="Barcode">Barcode</option>
                        </select>
                    <br>
                </div>

                <div class="column">
                    <label for="model" class="labels">Μοντέλο:</label>
                        <select name="model" id="model">
                            <option value="">Όλα τα μοντέλα</option>
                            <option value="Altec">Altec</option>
                            <option value="Dell">Dell</option>
                            <option value="Lexmark">Lexmark</option>
                        </select>
                    <br>
                </div>
                

                
                <div>
                    <div class="column">
                        <textarea id="note" name="note" rows="4" cols="50" class="note" placeholder="Περιγραφή..."></textarea>
                    </div>

                    <div class="column row">
                    <label for="import_date_start" class="margin-right">Από:</label>
                    <input type="date" name="import_date_start" id="import_date_start" class="date-width">

                    <label for="import_date_end" class="margin-right">Έως:</label>
                    <input type="date" name="import_date_end" id="import_date_end" class="date-width">

                    
                    </div>
                    <label for="import_date_end">Κατάσταση:</label>
                    <select name="current_state" id="current_state">
                            <option value="">Όλα</option>
                            <option value="Ανοιχτή">Ανοιχτές Βλάβες</option>
                            <option value="Κλειστή">Κλειστές Βλάβες</option>
                    </select>

                
        </div>

                <div class="import-button">
                    <input type="submit" value="Αναζήτηση">
                </div>
                </form>
                
            </div>               
                
            </form>
`)