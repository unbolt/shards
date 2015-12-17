@extends('layouts.master')

@section('title', 'User Dashboard')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div id="phaser-example"></div>


            <h3>Debug: Frame numbers</h3>

            <?php
                $var = 0;
            ?>

            <table class="table">
                @for ($i = 1; $i < 22; $i++)
                    <tr>
                        <th>
                            <?php echo $i; ?>
                        </th>
                        @for ($j = 0; $j < 13; $j++)
                            <td>
                                <?php
                                    echo $var;
                                    $var++;
                                ?>
                            </td>
                        @endfor
                    </tr>
                @endfor
            </table>
        </div>
    </div>
@stop
