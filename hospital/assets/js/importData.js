document.write (`
<div class="import-form">
            <div>
                <h2>Εισαγωγή νέας βλάβης</h2>
            </div>
            
                <form action="index.php" method="post" class="add">
                
                <div class="column">
                    <label for="department" class="labels">Τμήμα:</label>
                        
                        <select name="department" id="department">
                            <option value="">-</option>
                            <option value="Καρδιολογικό">Καρδιολογικό</option>
                            <option value="Βιοχημικό">Βιοχημικό</option>
                            <option value="Πνευμονολογική">Πνευμονολογική 1</option>
                            <option value="Αξονικός">Αξονικός</option>
                        </select>
                    <br/>
                </div>

                <div class="column">
                    <label for="specialty" class="labels">Ειδικότητα:</label>
                        <select name="specialty" id="specialty">
                            <option value="">-</option>
                            <option value="Προϊστάμενος">Προϊστάμενος</option>
                            <option value="Γραφέιο Ιατρών">Γραφέιο Ιατρών</option>
                        </select>
                    <br/>
                </div>

                <div class="column">
                    <label for="phone" class="labels">Τηλέφωνο:</label>
                    <input type="text" name="phone" id="phone" placeholder="-" autocomplete="off" required/>
                    <br/>
                </div>

                <div class="column">
                    <label for="hardware" class="labels">Είδος:</label>
                        <select name="hardware" id="hardware">
                            <option value="">-</option>
                            <option value="Η/Υ">Η/Υ</option>
                            <option value="Εκτυπωτής">Εκτυπωτής</option>
                            <option value="Οθόνη">Οθόνη</option>
                            <option value="Barcode">Barcode</option>
                        </select>
                    <br/>
                </div>

                <div class="column">
                    <label for="model" class="labels">Μοντέλο:</label>
                        <select name="model" id="model">
                            <option value="">-</option>
                            <option value="Altec">Altec</option>
                            <option value="Dell">Dell</option>
                            <option value="Lexmark">Lexmark</option>
                        </select>
                    <br/>
                </div>
                

                
                <div>
                    <div class="column">
                        <textarea id="note" name="note" rows="4" cols="50" class="note" placeholder="Περιγραφή..."></textarea>
                    </div>

                    <div class="column">
                        <label for="model" class="labels">Ημ. Εισαγωγής:</label>
                        <input type="date" name="import_date" id="import_date" class="date" placeholder="Ημερομηνία Παραλαβής" required/>
                        <br/>
                    </div>
                
        </div>

                <div class="import-button">
                    <input type="submit" value="Εισαγωγή"/>
                </div>
                </form>
                
            </div>
`)
