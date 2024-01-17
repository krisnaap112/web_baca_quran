
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>DataTables</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">DataTables</h2>
            <p class="section-lead">
              We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
            </p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Advanced Table</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>Task Name</th>
                            <th>Progress</th>
                            <th>Members</th>
                            <th>Due Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $no = 1;
                          foreach( $quran as $q ) : ?>
                          <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $q['surah']; ?></td>
                            <td><?= $q['arti_surah']; ?></td>
                            <td><?= $q['jumlah_ayat']; ?></td>
                            <td><?= $q['jenis_surah']; ?></td>
                          </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      